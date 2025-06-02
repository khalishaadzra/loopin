<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Cart;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $buyNowItemId = session()->pull('buy_now_item_id');
        $selectedItemIds = $request->input('selected_items', []);

        if ($buyNowItemId) {
            $item = Cart::get($buyNowItemId);
            if (!$item) {
                return redirect()->route('cart.index')->with('error', 'Item yang ingin dibeli sekarang tidak ditemukan di keranjang.');
            }
            $cartItems = collect([$item->id => $item]);
            $subtotal = $item->price * $item->quantity;
        } elseif (!empty($selectedItemIds)) {
            $cartItems = Cart::getContent()->filter(function ($item) use ($selectedItemIds) {
                return in_array($item->id, $selectedItemIds);
            });
            if ($cartItems->isEmpty()) {
                return redirect()->route('cart.index')->with('error', 'Pilih setidaknya satu item untuk di-checkout.');
            }
            $subtotal = $cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });
        } else {
            return redirect()->route('cart.index')->with('info', 'Silakan pilih item dari keranjang Anda untuk di-checkout.');
        }

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Tidak ada item untuk di-checkout.');
        }

        $shippingCost = 15000;
        $grandTotal = $subtotal + $shippingCost;
        $user = Auth::user();

        session(['checkout_item_ids' => $cartItems->pluck('id')->toArray()]);

        return view('loopin.checkout', compact('cartItems', 'subtotal', 'shippingCost', 'grandTotal', 'user'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:500',
            'detail_alamat' => 'nullable|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        $checkoutItemIds = session()->pull('checkout_item_ids');
        if (empty($checkoutItemIds)) {
            return redirect()->route('cart.index')->with('error', 'Tidak ada item yang dipilih untuk diproses.');
        }

        $cartItemsToProcess = Cart::getContent()->filter(function ($item) use ($checkoutItemIds) {
            return in_array($item->id, $checkoutItemIds);
        });

        if ($cartItemsToProcess->isEmpty()) {
            return redirect()->route('home')->with('error', 'Tidak ada item untuk di-checkout.');
        }

        DB::beginTransaction();
        try {
            $subtotalToProcess = $cartItemsToProcess->sum(fn($item) => $item->price * $item->quantity);
            $shippingCost = 15000;
            $grandTotalToProcess = $subtotalToProcess + $shippingCost;

            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'LOOPIN-' . strtoupper(Str::random(7)) . time(),
                'total_amount' => $grandTotalToProcess,
                'shipping_cost' => $shippingCost,
                'status' => 'Pesanan Diterima',
                'payment_method' => 'Cash on Delivery',
                'payment_status' => 'Berhasil (COD)',
                'recipient_name' => $request->nama_penerima,
                'shipping_address' => $request->alamat_lengkap,
                'shipping_address_detail' => $request->detail_alamat,
                'recipient_phone' => $request->nomor_telepon,
            ]);

            foreach ($cartItemsToProcess as $item) {
                $product = Product::find($item->id);
                if (!$product || $product->stock < $item->quantity) {
                    $errorMsg = !$product ? "Produk dengan ID {$item->id} tidak ditemukan." :
                        "Stok produk {$item->name} tidak mencukupi ({$product->stock} tersisa, {$item->quantity} diminta).";
                    throw new \Exception($errorMsg);
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'product_name' => $product->name,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ]);

                $product->stock -= $item->quantity;
                $product->save();
                Cart::remove($item->id);
            }

            DB::commit();
            return redirect()->route('checkout.success', ['order' => $order->id]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Checkout Process Error: ' . $e->getMessage() . ' - Stack: ' . $e->getTraceAsString());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses pesanan Anda. Silakan coba lagi. Detail: '.$e->getMessage())->withInput();
        }
    }

    public function success(Order $order)
    {
        // Hapus pengecekan session('checkout_success')
        if (Auth::id() !== $order->user_id) {
            abort(403, 'Anda tidak diizinkan mengakses halaman ini.');
        }

        return view('loopin.checkout_success', compact('order'));
    }
}
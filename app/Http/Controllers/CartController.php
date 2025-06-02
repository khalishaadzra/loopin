<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart; 

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::getContent()->sortBy('name'); 
        $cartTotal = Cart::getTotal();
        $cartItemCount = Cart::getTotalQuantity(); 

        return view('loopin.keranjang', compact('cartItems', 'cartTotal', 'cartItemCount'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'sometimes|integer|min:1',
            'action' => 'sometimes|string|in:add_to_cart,buy_now'
        ]);

        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity ?? 1;

        if ($product->stock < $quantity) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi.')->withInput();
        }

        if ($request->input('action') === 'buy_now') {

            // Tambahkan item yang mau dibeli sekarang
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'attributes' => [
                    'image_filename' => $product->main_image_filename,
                    'slug' => $product->slug,
                ]
            ]);
            // Simpan ID item yang baru ditambahkan untuk di-checkout langsung
            session(['buy_now_item_id' => $product->id]);
            return redirect()->route('checkout.index'); 
        }

        // Jika action "add_to_cart" atau tidak ada action
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'attributes' => [
                'image_filename' => $product->main_image_filename,
                'slug' => $product->slug,
            ]
        ]);
        
        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, $itemId) 
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($itemId); 
        if ($product && $product->stock < $request->quantity) {
            return redirect()->route('cart.index')->with('error', 'Stok produk tidak mencukupi untuk jumlah yang diminta.');
        }

        Cart::update($itemId, [
            'quantity' => [
                'relative' => false, 
                'value' => $request->quantity
            ],
        ]);
        return redirect()->route('cart.index')->with('success', 'Jumlah produk di keranjang berhasil diperbarui.');
    }

    public function remove($itemId) 
    {
        Cart::remove($itemId);
        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function clear()
    {
        Cart::clear();
        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil dikosongkan.');
    }
}
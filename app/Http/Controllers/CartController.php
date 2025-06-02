<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart; // Pastikan sudah install: composer require darryldecode/cart

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::getContent()->sortBy('name'); // Ambil semua item, urutkan berdasarkan nama
        $cartTotal = Cart::getTotal();
        $cartItemCount = Cart::getTotalQuantity(); // Jumlah total item di keranjang

        // Jika kamu mau, kamu bisa menambahkan informasi lain ke setiap item saat menambahkannya ke keranjang
        // Atau, jika gambar tidak disimpan di atribut cart, kamu bisa mengambilnya dari model Product
        // Tapi idealnya, saat Cart::add(), sertakan path gambar di attributes.

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

        // Jika action adalah "buy_now", kita bisa menyimpan ID produk ini di session
        // untuk diproses khusus di halaman checkout.
        if ($request->input('action') === 'buy_now') {
            // Opsi: Kosongkan keranjang dulu jika mau "beli sekarang" hanya item ini
            // Cart::clear(); // Hati-hati, ini mengosongkan seluruh keranjang! Mungkin perlu konfirmasi.

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
            return redirect()->route('checkout.index'); // Langsung ke checkout
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

    public function update(Request $request, $itemId) // $itemId adalah ID item di keranjang (sama dengan product_id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($itemId); // Dapatkan produk untuk cek stok
        if ($product && $product->stock < $request->quantity) {
            return redirect()->route('cart.index')->with('error', 'Stok produk tidak mencukupi untuk jumlah yang diminta.');
        }

        Cart::update($itemId, [
            'quantity' => [
                'relative' => false, // false berarti set jumlah baru, true berarti tambah/kurang dari yg ada
                'value' => $request->quantity
            ],
        ]);
        return redirect()->route('cart.index')->with('success', 'Jumlah produk di keranjang berhasil diperbarui.');
    }

    public function remove($itemId) // $itemId adalah ID item di keranjang (sama dengan product_id)
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
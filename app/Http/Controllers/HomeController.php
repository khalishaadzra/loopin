<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::take(4)->get(); // Ambil 4 kategori (sesuaikan jumlahnya)
        $newProducts = Product::where('is_new_product', true)->latest()->take(4)->get();
        $bigDealProducts = Product::where('is_big_deal', true)->whereNotNull('original_price')->latest()->take(4)->get();

        // Pastikan path gambar di view menggunakan asset() dengan benar
        // Contoh: $category->icon_filename akan berisi "atasanc.svg"
        // Di Blade: asset($category->icon_filename) akan menghasilkan http://localhost:8000/atasanc.svg (jika file ada di public/)

        return view('loopin.home', compact('categories', 'newProducts', 'bigDealProducts'));
    }
}

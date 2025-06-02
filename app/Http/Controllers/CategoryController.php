<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request; 

class CategoryController extends Controller
{
    /**
     * Menampilkan halaman daftar semua kategori beserta beberapa produknya (untuk /category).
     */
    public function index()
    {
        $categoriesWithProducts = Category::with(['products' => function ($query) {
            $query->where('stock', '>', 0)->latest()->take(8);
        }])
        ->whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })
        ->orderBy('name')
        ->get();

        return view('loopin.category', compact('categoriesWithProducts'));
    }

    /**
     * Menampilkan semua produk dalam satu kategori spesifik (untuk /category/{slug}).
     */
    // app/Http/Controllers/CategoryController.php
    public function show(Category $category)
    {
        $products = $category->products()
                            ->where('stock', '>', 0) 
                            ->latest()
                            ->paginate(12); 
                            
        return view('loopin.category_show', compact('category', 'products'));
    }
}
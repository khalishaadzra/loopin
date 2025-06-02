<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; 
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan halaman explore dengan semua produk (dengan filter dan pagination).
     */
    public function index(Request $request)
    {
        $query = Product::query()->with('category')->latest(); 

        // Fitur Pencarian
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('category', function ($cq) use ($searchTerm) {
                      $cq->where('name', 'LIKE', "%{$searchTerm}%");
                  });
            });
        }

        // Fitur Filter Kategori (contoh)
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Fitur Filter Harga (contoh)
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Urutkan (contoh)
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc'); 
        if (in_array($sortBy, ['name', 'price', 'created_at'])) {
             $query->orderBy($sortBy, $sortOrder);
        }


        $products = $query->paginate(12); 

        // Untuk filter dropdowns
        $categories = Category::orderBy('name')->get();

        return view('loopin.explore', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $product->load(['images' => function ($query) {
            $query->orderBy('order', 'asc');
        }, 'category']);

        return view('loopin.detailproduk', compact('product'));
    }
}
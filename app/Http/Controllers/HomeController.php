<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::take(4)->get(); 
        $newProducts = Product::where('is_new_product', true)->latest()->take(4)->get();
        $bigDealProducts = Product::where('is_big_deal', true)->whereNotNull('original_price')->latest()->take(4)->get();

        return view('loopin.home', compact('categories', 'newProducts', 'bigDealProducts'));
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('loopin.landing');
});

Route::get('/home', function () {
    return view('loopin.home');
});

Route::get('/explore', function () {
    return view('loopin.explore');
});

Route::get('/signup', function () {
    return view('loopin.signup');
});

Route::get('/login', function () {
    return view('loopin.login');
});

Route::get('/detailproduk', function () {
    return view('loopin.detailproduk');
});

Route::get('/keranjang', function () {
    return view('loopin.keranjang');
});

Route::get('/checkout', function () {
    return view('loopin.checkout');
});

Route::get('/myprofile', function () {
    return view('loopin.myprofile');
});

Route::get('/category', function () {
    return view('loopin.category');
});


Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup'); 
Route::post('/signup', [AuthController::class, 'signup']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); 
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 

// Route untuk halaman home setelah login
Route::get('/home', [HomeController::class, 'index']) 
    ->middleware('auth')
    ->name('home'); 


// Route untuk halaman Explore (daftar semua produk dengan filter & search)
Route::get('/explore', [ProductController::class, 'index'])->name('products.explore');

// Route untuk halaman Detail Produk (menggunakan slug dari produk)
Route::get('/produk/{product:slug}', [ProductController::class, 'show'])->name('products.show');

// Route untuk halaman daftar semua kategori (jika ada)
Route::get('/category', [CategoryController::class, 'index'])->name('categories.index');

// Route untuk halaman produk per kategori (menggunakan slug dari kategori)
Route::get('/category/{category:slug}', [App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');

Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');

Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');

Route::post('/keranjang/tambah', [CartController::class, 'add'])->name('cart.add');
Route::post('/keranjang/update/{itemId}', [CartController::class, 'update'])->name('cart.update');
Route::get('/keranjang/hapus/{itemId}', [CartController::class, 'remove'])->name('cart.remove'); // Atau POST
Route::get('/keranjang/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/proses', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success')->middleware('auth');

    Route::get('/myprofile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/myprofile/update-profile', [ProfileController::class, 'updateProfile'])->name('profile.update.profile');
    Route::post('/myprofile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    
    // Route untuk Riwayat Pesanan
    Route::get('/myprofile/orders', [ProfileController::class, 'orders'])->name('profile.orders'); // Daftar pesanan
    Route::get('/myprofile/orders/{order}', [ProfileController::class, 'showOrder'])->name('profile.orders.show'); // Detail satu pesanan

});










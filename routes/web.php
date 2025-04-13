<?php

use Illuminate\Support\Facades\Route;

Route::get('/coba', function () {
    return view('welcome');
});

Route::get('/landing', function () {
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








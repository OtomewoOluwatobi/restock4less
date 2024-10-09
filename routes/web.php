<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/shop/display', function () {
    return view('display');
})->name('display');

Route::get('/001', [ProductController::class, 'index'])->name('admin');
// Define a route that calls the store function
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


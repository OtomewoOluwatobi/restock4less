<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'five_random_products'])->name('home');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/shop/display', function () {
    return view('display');
})->name('display');

Route::get('/001', [ProductController::class, 'index'])->name('admin');
Route::get('/001/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/001/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/001/products/activate/{id}', [ProductController::class, 'activate_product'])->name('products.activate');
Route::get('/001/products/deactivate/{id}', [ProductController::class, 'deactivate_product'])->name('products.deactivate');


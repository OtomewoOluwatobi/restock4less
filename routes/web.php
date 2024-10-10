<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'five_random_products'])->name('home');

Route::get('/shop',  [ProductController::class, 'shop_index'])->name('shop');

Route::get('/shop/display/{id}', [ProductController::class, 'shop_show'])->name('display');

Route::get('/001', [ProductController::class, 'index'])->name('admin');
Route::get('/001/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/001/products', [ProductController::class, 'store'])->name('products.store');
Route::post('/001/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/001/products/activate/{id}', [ProductController::class, 'activate_product'])->name('products.activate');
Route::get('/001/products/deactivate/{id}', [ProductController::class, 'deactivate_product'])->name('products.deactivate');


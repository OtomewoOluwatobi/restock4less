<?php

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

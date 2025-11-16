<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/filter', function () {
    return view('filter');
})->name('filter');

Route::get('/product/{productId}', [App\Http\Controllers\ProductController::class, 'show'])
    ->name('product.show');


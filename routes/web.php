<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;

Route::get('/', [SectionController::class, 'index'])->name('home');

Route::get('/filter', function () {
    return view('filter');
})->name('filter');

Route::get('/section/{sectionSlug}', [SectionController::class, 'show'])
    ->name('section.show');

Route::get('/search', [SectionController::class, 'search'])
    ->name('search');

Route::get('/product/{productId}', [App\Http\Controllers\ProductController::class, 'show'])
    ->name('product.show');


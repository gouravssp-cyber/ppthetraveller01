<?php

use App\Models\Package;
use App\Models\PackageSection;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');


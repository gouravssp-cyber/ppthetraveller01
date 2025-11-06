<?php

use App\Models\Package;
use App\Models\PackageSection;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/sections/{slug}', function ($slug) {
    $section = PackageSection::where('slug', $slug)
        ->active()
        ->firstOrFail();

    return view('section', compact('section'));
})->name('sections.show');

// Booking form submission route
Route::post('/booking-data-mail', [App\Http\Controllers\BookingController::class, 'sendBookingMail'])->name('booking.mail');


Route::get('{slug}', function ($slug) {
    $package = Package::where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();

    return view('packages.show', compact('package'));
})->name('packages.show');
<?php

use App\Models\Package;
use App\Models\PackageSection;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');


// Privacy Policy
// Terms of Service
// Cookie Policy

Route::get('/privacy-policy', function () {
    return view('footerpages.privacy-policy');
})->name('privacy-policy');

Route::get('/terms-of-service', function () {
    return view('footerpages.terms-of-service');
})->name('terms-of-service');

Route::get('/refund-policy', function () {
    return view('footerpages.refund-policy');
})->name('refund-policy');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/section/{slug}', function ($slug) {
    return view('section', ['slug' => $slug]);
})->name('sections.show');


Route::get('/domestic', function () {
    $packages = Package::published()
        ->domestic()
        ->with(['destination', 'tourType', 'gallery'])
        ->get();
    
    // Group packages by destination
    $destinations = $packages->groupBy('destination_id')->map(function ($destinationPackages) {
        return [
            'destination' => $destinationPackages->first()->destination,
            'packages' => $destinationPackages
        ];
    })->values();

    return view('domestic', compact('destinations'));
})->name('domestic');

Route::get('/international', function () {
    $packages = Package::published()
        ->international()
        ->with(['destination', 'tourType', 'gallery'])
        ->get();
    
    // Group packages by destination
    $destinations = $packages->groupBy('destination_id')->map(function ($destinationPackages) {
        return [
            'destination' => $destinationPackages->first()->destination,
            'packages' => $destinationPackages
        ];
    })->values();

    return view('international', compact('destinations'));
})->name('international');

// Booking form submission route
Route::post('/booking-data-mail', [App\Http\Controllers\BookingController::class, 'sendBookingMail'])->name('booking.mail');




Route::get('{slug}', function ($slug) {
    $package = Package::where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();

    return view('packages.show', compact('package'));
})->name('packages.show');
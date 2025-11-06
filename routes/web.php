<?php

use App\Models\Package;
use App\Models\PackageSection;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');

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
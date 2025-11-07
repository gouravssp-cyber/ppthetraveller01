<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Destination;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share destination data with navigation component
        View::composer('components.navigation', function ($view) {
            $domesticDestinations = Destination::whereHas('packages', function ($query) {
                $query->published()->domestic();
            })->get();
            
            $internationalDestinations = Destination::whereHas('packages', function ($query) {
                $query->published()->international();
            })->get();
            
            $view->with([
                'domesticDestinations' => $domesticDestinations,
                'internationalDestinations' => $internationalDestinations,
            ]);
        });
    }
}

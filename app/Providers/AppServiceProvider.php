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
            // Get destinations directly by tour type
            $domesticDestinations = Destination::active()
                ->domestic()
                ->orderBy('name')
                ->get();
            
            $internationalDestinations = Destination::active()
                ->international()
                ->orderBy('name')
                ->get();
            
            $view->with([
                'domesticDestinations' => $domesticDestinations,
                'internationalDestinations' => $internationalDestinations,
            ]);
        });
    }
}

<?php

namespace App\Providers;

use App\Models\Faculty;
use Illuminate\Support\ServiceProvider;

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
        view()->composer([
            'create-schedule'
        ], function ($view) {
            $view->with('faculties', Faculty::all());
        });
    }
}

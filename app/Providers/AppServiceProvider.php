<?php

namespace App\Providers;

use App\Models\Term;
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
            'create-schedule',
            'manage-subjects'
        ], function ($view) {
            $view->with('faculties', Faculty::all());
            $view->with('terms', Term::all());
        });
    }
}

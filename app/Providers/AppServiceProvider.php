<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Make sure this is correct
use App\Models\Course;
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
        //
       
       
            // Share courses data with all views
            View::composer('*', function ($view) {
                $view->with('courses', Course::all());
            });
       
    }
}

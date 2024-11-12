<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Make sure this is correct
use App\Models\Course;
use App\Models\Post;

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
    // Share courses data with all views
    View::composer('*', function ($view) {
        $view->with('courses', Course::all());
    });

    // Share latest posts with the footer view
    View::composer('partials.footer', function ($view) {
        $view->with('latestPosts', Post::latest()->take(4)->get());
    });
}

    
}

<?php
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            return route('index'); // Replace 'login' with your actual login route name
        }
    
        return null; // Return null if the request expects JSON
    }

        // Redirect to the custom admin login route
      //  return route('admin.login');
    }


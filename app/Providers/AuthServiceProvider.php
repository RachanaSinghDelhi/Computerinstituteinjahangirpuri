<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Define model policies here if any
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Define Gates for role-based access
        Gate::define('super_admin', function ($user) {
            return $user->role === 'super_admin';
        });

        Gate::define('admin', function ($user) {
            return in_array($user->role, ['super_admin', 'admin']);
        });

        Gate::define('teacher', function ($user) {
            return in_array($user->role, ['super_admin', 'admin', 'teacher']);
        });

        Gate::define('student', function ($user) {
            return in_array($user->role, ['super_admin', 'admin', 'teacher', 'student']);
        });
    }
}

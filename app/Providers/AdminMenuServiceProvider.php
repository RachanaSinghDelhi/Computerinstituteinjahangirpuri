<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AdminMenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('admin_menu', function () {
            return $this->getAdminMenu();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Get the admin menu structure.
     */
    public function getAdminMenu()
    {
        $user = Auth::user(); // Get authenticated user
        $role = $user->role ?? null; // Ensure safe access

        return array_values(array_filter([
            [
                'text' => 'Dashboard',
                'route' => 'course.index',
                'icon'  => 'fas fa-tachometer-alt',
                'can'   => ['super_admin', 'admin', 'teacher'],
            ],

            $role === 'super_admin' ? [
                'text'    => 'Courses',
                'icon'    => 'fas fa-book',
                'submenu' => [
                    ['text' => 'Add Course', 'route' => 'course.create', 'icon' => 'fas fa-plus-circle'],
                    ['text' => 'Course List', 'route' => 'course.index', 'icon' => 'fas fa-list'],
                ],
            ] : null,

            in_array($role, ['super_admin', 'admin']) ? [
                'text'    => 'Posts',
                'icon'    => 'fas fa-edit',
                'submenu' => [
                    ['text' => 'Add Post', 'route' => 'posts.create_post', 'icon' => 'fas fa-plus-circle'],
                    ['text' => 'Post List', 'route' => 'posts.new_posts', 'icon' => 'fas fa-list'],
                ],
            ] : null,

            [
                'text'    => 'Students',
                'icon'    => 'fas fa-user-graduate',
                'submenu' => [
                    ['text' => 'Add Student', 'route' => 'students.create', 'icon' => 'fas fa-plus-circle'],
                    ['text' => 'Ajax Student', 'route' => 'student.index', 'icon' => 'fas fa-list'],
                    ['text' => 'Student List', 'route' => 'students.index', 'icon' => 'fas fa-list'],
                    ['text' => 'ID Cards', 'route' => 'students.id-cards', 'icon' => 'fas fa-id-card'],
                ],
            ],

            [
                'text'    => 'Fees',
                'icon'    => 'fas fa-money-check-alt',
                'submenu' => [
                    ['text' => 'Fees', 'route' => 'fees.index', 'icon' => 'fas fa-list'],
                    ['text' => 'Receipts', 'route' => 'receipts.index', 'icon' => 'fas fa-list'],
                    ['text' => 'Fees received', 'route' => 'fees.received', 'icon' => 'fas fa-list'],
                    ['text' => 'Fees Pending', 'route' => 'fees.pending', 'icon' => 'fas fa-list'],
                ],
            ],

            [
                'text'    => 'Certificates',
                'icon'    => 'fas fa-certificate',
                'submenu' => [
                    ['text' => 'Certificates', 'route' => 'certificates.index', 'icon' => 'fas fa-list'],
                    ['text' => 'Select Certificates', 'route' => 'certificates.select', 'icon' => 'fas fa-list'],
                ],
            ],

            [
                'text'    => 'Expenses',
                'icon'    => 'fas fa-calculator',
                'submenu' => [
                    ['text' => 'Expenses', 'route' => 'expenses.index', 'icon' => 'fas fa-list'],
                    ['text' => 'Add Expenses', 'route' => 'expenses.create', 'icon' => 'fas fa-plus-circle'],
                ],
            ],

            [
                'text'    => 'Users',
                'icon'    => 'fas fa-user-cog',
                'submenu' => [
                    ['text' => 'User List', 'route' => 'users.index', 'icon' => 'fas fa-list'],
                    ['text' => 'Create User', 'route' => 'users.create', 'icon' => 'fas fa-plus-circle'],
                ],
            ],

            [
                'text'  => 'Logout',
                'route' => 'admin.logout',
                'icon'  => 'fas fa-sign-out-alt',
            ],
        ]));
    }
}

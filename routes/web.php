<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminLoginController;

# Admin Login Routes
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login']);
Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

# Homepage Route
Route::get('/', [PostController::class, 'showHomepage']);

# Public Routes (Access without Authentication)
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/blogs', [PostController::class, 'blogs'])->name('blogs');

# Updated Post Route (Public - Not Inside Auth Middleware)
Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');



# Dashboard and Authenticated Routes
Route::middleware(['auth'])->group(function () {

    # Dashboard Routes
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    # Post Routes (using resource route)
    Route::resource('posts', PostController::class);  // Automatically generates the necessary routes

    Route::get('/dashboard/create-post', [PostController::class, 'create'])->name('dashboard.create_post');
    Route::post('/dashboard/store-post', [PostController::class, 'store'])->name('dashboard.store_post');
    Route::get('/dashboard/new-posts', [PostController::class, 'index'])->name('dashboard.new_posts');
    
    # News Routes
    Route::prefix('dashboard')->group(function () {
        Route::get('/news', [NewsController::class, 'index'])->name('dashboard.news.index');
        Route::post('/news', [NewsController::class, 'store'])->name('dashboard.news.store');
    });

    # Course Routes
    Route::prefix('dashboard')->group(function () {
        Route::get('/course', [CourseController::class, 'create'])->name('course.create');
        Route::post('/course', [CourseController::class, 'store'])->name('courses.store');
    });

    # Course CRUD Routes
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::post('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
    Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.show');
});


Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

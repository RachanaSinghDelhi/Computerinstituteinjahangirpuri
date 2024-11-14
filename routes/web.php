<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminLoginController;




Route::get('/faq', [PageController::class, 'faq'])->name('faq');


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

# Single Post Route
Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');

# Authenticated Routes
Route::middleware(['auth'])->group(function () {
    # Dashboard Route
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    # Post Routes
    Route::resource('posts', PostController::class);  // Automatically generates routes for posts

    # Custom Post Management Routes
    Route::get('/dashboard/create-post', [PostController::class, 'create'])->name('dashboard.create_post');
    Route::post('/dashboard/store-post', [PostController::class, 'store'])->name('dashboard.store_post');
    Route::get('/dashboard/new-posts', [PostController::class, 'index'])->name('dashboard.new_posts');

    # News Routes under Dashboard Prefix
    Route::prefix('dashboard')->group(function () {
        Route::get('/news', [NewsController::class, 'index'])->name('dashboard.news.index');
        Route::post('/news', [NewsController::class, 'store'])->name('dashboard.news.store');
    });

    # Course Routes under Dashboard Prefix
    Route::prefix('dashboard')->group(function () {
        Route::get('/course', [CourseController::class, 'create'])->name('course.create');
        Route::post('/course', [CourseController::class, 'store'])->name('courses.store');
    });

    # Additional Course CRUD Routes
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::post('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
});

# Public Course Detail Route
Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.show');


# Privacy Policy Route
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');


# Updates Route for Blog Posts
Route::get('/updates', [PostController::class, 'blogs'])->name('posts.blogs');

Route::get('/about', [PostController::class, 'showSidebar'])->name('posts.about');


Route::get('/introduction', [PageController::class, 'showIntroductionPage'])->name('introduction.page');
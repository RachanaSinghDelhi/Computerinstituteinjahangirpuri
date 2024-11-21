<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ContactController;


use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'index'])->name('home');


Route::get('/faq', [PageController::class, 'faq'])->name('faq');


# Admin Login Routes
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login']);
Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

# Homepage Route


# Public Routes (Access without Authentication)
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/blogs', [PostController::class, 'blogs'])->name('posts.blogs');
Route::get('/courses_list',[PageController::class,'courses'])->name('courses');
# Single Post Route
Route::get('/posts/{url}', [PostController::class, 'show'])->name('posts.show');

Route::get('/updates/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/about', [PostController::class, 'showSidebar'])->name('posts.about');

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
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('dashboard.edit_edit');
    Route::get('/dashboard/edit_posts', [PostController::class, 'update'])->name('dashboard.update_post');
    

    # News Routes under Dashboard Prefix
    Route::prefix('dashboard')->group(function () {
        Route::get('/news', [NewsController::class, 'index'])->name('dashboard.news.index');
        Route::post('/news', [NewsController::class, 'store'])->name('dashboard.news.store');
    });
    Route::prefix('dashboard')->group(function () {
        // Create Course Routes
        Route::get('/course', [CourseController::class, 'create'])->name('course.create');
        Route::post('/course', [CourseController::class, 'store'])->name('courses.store');
        
        // Additional Course CRUD Routes
        Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
        
        Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update'); 
        Route::delete('/course/{id}', [CourseController::class, 'destroy'])->name('course.destroy');
    });
    
});

# Public Course Detail Route
Route::get('/course/{course_url}', [CourseController::class, 'show'])->name('course.show');


# Privacy Policy Route
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');


Route::get('/about', [PostController::class, 'showSidebar'])->name('posts.about');


Route::get('/introduction', [PageController::class, 'showIntroductionPage'])->name('introduction.page');





<?php
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;








Route::resource('posts', PostController::class);  // This will automatically generate the necessary routes






Route::get('/blogs', [PostController::class, 'blogs'])->name('blogs');
// Route to display a single post in detail
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');


// Route to display the form for creating a post
Route::get('/dashboard/create-post', [PostController::class, 'create'])->name('dashboard.create_post');

// Route to handle the form submission for creating a post
Route::post('/dashboard/store-post', [PostController::class, 'store'])->name('dashboard.store_post');

// Route to display the list of posts in tabular format (post listing)
Route::get('/dashboard/new-posts', [PostController::class, 'index'])->name('dashboard.new_posts');






Route::prefix('dashboard')->group(function () {
    Route::get('/news', [NewsController::class, 'index'])->name('dashboard.news.index');
    Route::post('/news', [NewsController::class, 'store'])->name('dashboard.news.store');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});



Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


// routes/web.php



Route::post('/dashboard/course', [CourseController::class, 'store'])->name('courses.store');


Route::get('/dashboard/course', [CourseController::class, 'create'])->name('course.create');
Route::post('/dashboard/', [CourseController::class, 'create'])->name('course.create');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//edit
// routes.php
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::post('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

//delete
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

// routes/web.php
Route::get('/', [CourseController::class, 'showCourses']);





Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.show');








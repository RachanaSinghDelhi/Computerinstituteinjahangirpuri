<?php
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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








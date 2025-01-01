<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentableController;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\FeeController;

use App\Http\Controllers\StudentFeesController;
use App\Http\Controllers\ReceiptController;


// Route to view the certificates page



Route::prefix('dashboard')->group(function () {
 

Route::post('/upload-receipts', [ReceiptController::class, 'upload'])->name('upload.receipts');

    Route::get('/fees', [FeeController::class, 'index'])->name('fees.index'); // List all students' fees
    Route::get('/fees/{student}/single-fees', [FeeController::class, 'show'])->name('fees.single_fees');
 Route::get('/fees/{student}/add-fees', [FeeController::class, 'create'])->name('fees.add_fees'); // Route for the add_fees page
Route::post('/fees/{student}/add-fees', [FeeController::class, 'store'])->name('fees.store_fees'); // Form submission for fees
Route::get('/{fee}/edit', [FeeController::class, 'edit'])->name('fees.edit'); // Edit form
    Route::put('/{fee}', [FeeController::class, 'update'])->name('fees.update'); // Update route
    Route::delete('/{fee}', [FeeController::class, 'destroy'])->name('fees.destroy'); // Delete route
    Route::get('/search-fees', [FeeController::class, 'search'])->name('search.fees');   
});

// In web.php



Route::get('/sync-student-fees', [StudentFeesController::class, 'syncStudentFees'])->name('student.fees.sync');


// Route to display the add fee form
//Route::get('fees/add', [FeeController::class, 'create'])->name('fees.create');

// Route to store the fee data
//Route::post('fees/store', [FeeController::class, 'store'])->name('fees.store');



Route::get('/import-excel', [ExcelImportController::class, 'import']);

Route::get('/import-courses', [ExcelImportController::class, 'importCourses']);

Route::prefix('certificates')->group(function () {
    Route::get('/', [CertificateController::class, 'index'])->name('certificates.index');
    Route::get('/show/{studentId}/{courseId}', [CertificateController::class, 'show'])->name('certificates.show');
    Route::get('/generate/{studentId}/{courseId}', [CertificateController::class, 'generate'])->name('certificates.generate');
});

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
Route::get('/courses',[PageController::class,'list'])->name('courses.list');
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
    Route::prefix('dashboard')->group(function () {
    Route::get('/posts/create-post', [PostController::class, 'create'])->name('posts.create_post');
    Route::post('/posts/store-post', [PostController::class, 'store'])->name('posts.store_post');
    Route::get('/posts/new-posts', [PostController::class, 'index'])->name('posts.new_posts');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit_edit');
    Route::get('/posts/edit_posts', [PostController::class, 'update'])->name('posts.update_post');
    });

    # News Routes under Dashboard Prefix
    Route::prefix('dashboard')->group(function () {
        Route::get('/news', [NewsController::class, 'index'])->name('dashboard.news.index');
        Route::post('/news', [NewsController::class, 'store'])->name('dashboard.news.store');
    });
    Route::prefix('dashboard')->group(function () {
        // Create Course Routes
        Route::get('/add_course', [CourseController::class, 'create'])->name('course.create');
        Route::post('/add_course', [CourseController::class, 'store'])->name('course.store');
        
        // Additional Course CRUD Routes
        Route::get('/course', [CourseController::class, 'index'])->name('course.index');
        Route::get('/course/{id}/edit', [CourseController::class, 'edit'])->name('course.edit');
        
        Route::put('/course/{id}', [CourseController::class, 'update'])->name('course.update'); 
        Route::delete('/course/{id}', [CourseController::class, 'destroy'])->name('course.destroy');
    });
    
});

# Public Course Detail Route
Route::get('/courses/{course_url}', [CourseController::class, 'show'])->name('courses.show');


# Privacy Policy Route
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');


Route::get('/about', [PostController::class, 'showSidebar'])->name('posts.about');


Route::get('/introduction', [PageController::class, 'showIntroductionPage'])->name('introduction.page');






 // Handle form submission
Route::prefix('dashboard')->middleware(['auth'])->group(function () {

    // Create Student Route
    Route::get('/add-student', [StudentController::class, 'create'])->name('students.create'); // Show form
    Route::post('/add-student', [StudentController::class, 'store'])->name('students.store');
    
    // List All Students (index)
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    
    // Edit a Student
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    
    // Update a Student
  Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
 


    
    // Delete a Student
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

  

Route::get('/students/id-cards', [StudentController::class, 'showIdCards'])->name('students.id-cards');
Route::get('/student/{student_id}/student-id-card', [StudentController::class, 'downloadIdCard'])->name('students.downloadIdCard');
Route::get('/students/student-id-card/{student_id}', [StudentController::class, 'viewIdCard'])->name('students.viewIdCard');
Route::post('/students/download-selected-id-cards', [StudentController::class, 'downloadSelectedIdCards'])->name('students.downloadSelectedIdCards');
Route::delete('/students/delete-multiple', [StudentController::class, 'deleteMultiple'])->name('students.deleteMultiple');
Route::patch('/students/{student}/status', [StudentController::class, 'updateStatus'])->name('students.updateStatus');

//stunt table editable

Route::get('/ajaxstudents', [StudentableController::class, 'index'])->name('student.index');
Route::post('students/update', [StudentableController::class, 'update'])->name('update.student');
Route::post('students/photo/update', [StudentableController::class, 'updatePhoto'])->name('update.student.photo');
Route::post('/students/store', [StudentableController::class, 'store'])->name('students.store');
Route::delete('/dashboard/student/{student_id}', [StudentableController::class, 'destroy'])->name('delete.student');



//certificates
Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
Route::get('/certificate/view/{id}', [CertificateController::class, 'viewCertificate'])->name('dashboard.certificates.view');
Route::post('/certificates/download-selected', [CertificateController::class, 'downloadSelected'])->name('certificates.downloadSelected');
Route::get('/certificates/select_certificates', [CertificateController::class, 'selectCertificates'])->name('certificates.select');

});



Route::delete('/students/delete-multiple', [StudentController::class, 'deleteMultiple'])->name('students.deleteMultiple');

Route::post('students/import', [StudentController::class, 'import'])->name('students.import');



// Route to display the student table




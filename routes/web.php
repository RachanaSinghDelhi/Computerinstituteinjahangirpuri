<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentableController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\StudentFeesController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\FeeController as AdminFeeController;
use App\Http\Controllers\Admin\CertificateController as AdminCertificateController;




// Public Routes (No Authentication Required)
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/blogs', [PostController::class, 'blogs'])->name('posts.blogs');
Route::get('/courses_list', [PageController::class, 'courses'])->name('courses');
Route::get('/courses', [PageController::class, 'list'])->name('courses.list');
Route::get('/courses/{course_url}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/introduction', [PageController::class, 'showIntroductionPage'])->name('introduction.page');
// Single Post Route
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

// Login and Logout Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Admin Login Routes
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login']);
Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Super Admin Routes
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/superadmin', function () {
        return view('dashboard.index');
    })->name('superadmin.dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Dashboard Prefix Routes
    Route::prefix('dashboard')->group(function () {
        // Fees Routes
        Route::get('/fees', [FeeController::class, 'index'])->name('fees.index');
        Route::get('/fees/{student_id}', [FeeController::class, 'show'])->name('fees.show');
        Route::get('/fees/add/{student_id}', [FeeController::class, 'addStudentFees'])->name('add_fees');
        Route::post('/fees/store', [FeeController::class, 'saveStudentFee'])->name('save_student_fee');
      // For editing fee records
Route::get('fees/{fee}/edit', [FeeController::class, 'edit'])->name('fees.edit');
Route::put('fees/{fee}', [FeeController::class, 'update'])->name('fees.update');
        Route::delete('/fees/{id}', [FeeController::class, 'destroy'])->name('fees.destroy');
        Route::get('/search-fees', [FeeController::class, 'search'])->name('search.fees');
        Route::put('/fees/update/{student_id}', [FeeController::class, 'updateStudentFees'])->name('fees.updateStudentFees');
        Route::put('/fees/updateCourse/{student_id}', [FeeController::class, 'updateCourse'])->name('fees.updateCourse');
        Route::put('/fees/{student_id}/update-total-fees', [FeeController::class, 'updateTotalFees'])->name('updateTotalFees');

        // Receipt Routes
        Route::get('/receipts', [ReceiptController::class, 'showReceipts'])->name('receipts.index');
        Route::post('/receipts/upload', [ReceiptController::class, 'uploadReceipts'])->name('receipts.upload');

        // Student Routes
        Route::get('/add-student', [StudentController::class, 'create'])->name('students.create');
        Route::post('/add-student', [StudentController::class, 'liststore'])->name('students.liststore');
        Route::get('/students', [StudentController::class, 'index'])->name('students.index');
        Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
        Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
        Route::get('/students/id-cards', [StudentController::class, 'showIdCards'])->name('students.id-cards');
        Route::get('/student/{student_id}/student-id-card', [StudentController::class, 'downloadIdCard'])->name('students.downloadIdCard');
        Route::get('/students/student-id-card/{student_id}', [StudentController::class, 'viewIdCard'])->name('students.viewIdCard');
        Route::post('/students/download-selected-id-cards', [StudentController::class, 'downloadSelectedIdCards'])->name('students.downloadSelectedIdCards');
        Route::patch('/students/update-status', [StudentController::class, 'updateStatus'])->name('students.update-status');
        Route::delete('/students/destroy', [StudentController::class, 'destroy'])->name('students.destroy');
        Route::get('/students/search', [StudentController::class, 'search'])->name('students.search');
        Route::post('/students/exportExcel', [StudentController::class, 'exportExcel'])->name('students.exportExcel');
        Route::get('/students/exportSQL', [StudentController::class, 'exportSQL'])->name('students.exportSQL');
        Route::patch('/students/bulk-update-status', [StudentController::class, 'bulkUpdateStatus'])->name('students.bulkUpdateStatus');
        Route::delete('/students/delete-multiple', [StudentController::class, 'deleteMultiple'])->name('students.deleteMultiple');

        // Student Table Routes
        Route::get('/ajaxstudents', [StudentableController::class, 'index'])->name('student.index');
        Route::post('students/update', [StudentableController::class, 'update'])->name('update.student');
        Route::post('students/photo/update', [StudentableController::class, 'updatePhoto'])->name('update.student.photo');
        Route::post('/students/store', [StudentableController::class, 'store'])->name('students.store');
        Route::delete('/dashboard/student/{student_id}', [StudentableController::class, 'destroy'])->name('delete.student');
        Route::get('student_table/search', [StudentableController::class, 'search'])->name('student_table.search');

        // Certificate Routes
        Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
        Route::get('/certificate/view/{id}', [CertificateController::class, 'viewCertificate'])->name('dashboard.certificates.view');
        Route::post('/certificates/download-selected', [CertificateController::class, 'downloadSelected'])->name('certificates.downloadSelected');
        Route::get('/certificates/select_certificates', [CertificateController::class, 'selectCertificates'])->name('certificates.select');
        Route::get('/certificate-search', [CertificateController::class, 'search'])->name('certificate.search');
        Route::get('certificates/selectsearch', [CertificateController::class, 'selectSearch'])->name('certificate.selectsearch');

        // Course Routes
        Route::get('/add_course', [CourseController::class, 'create'])->name('course.create');
        Route::post('/add_course', [CourseController::class, 'store'])->name('course.store');
        Route::get('/course', [CourseController::class, 'index'])->name('course.index');
        Route::get('/course/{id}/edit', [CourseController::class, 'edit'])->name('course.edit');
        Route::put('/course/{id}', [CourseController::class, 'update'])->name('course.update');
        Route::delete('/course/{id}', [CourseController::class, 'destroy'])->name('course.destroy');
        Route::get('/course/search', [CourseController::class, 'search'])->name('course.search');

        // Post Routes
        Route::get('/posts/create-post', [PostController::class, 'create'])->name('posts.create_post');
        Route::post('/posts/store-post', [PostController::class, 'store'])->name('posts.store_post');
        Route::get('/posts/new-posts', [PostController::class, 'index'])->name('posts.new_posts');
        Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit_edit');
        Route::get('/posts/edit_posts', [PostController::class, 'update'])->name('posts.update_post');

        // News Routes
        Route::get('/news', [NewsController::class, 'index'])->name('dashboard.news.index');
        Route::post('/news', [NewsController::class, 'store'])->name('dashboard.news.store');
    });

    // User Management Routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->get('/admin', function () {
    return view('admin.index');
})->name('admin.dashboard');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::patch('/admin/students/bulk-update-status', [AdminController::class, 'bulkUpdateStatus'])
    ->name('admin.students.bulkUpdateStatus');

    // Individual status update
Route::patch('/students/update-status/{student}', [AdminController::class, 'updateStatus'])
->name('students.updateStatus');
  // Add Student Routes
  Route::get('/admin/students/add', [AdminStudentController::class, 'create'])
  ->name('admin.students.add');
Route::post('/admin/students/add', [AdminStudentController::class, 'store'])
  ->name('admin.students.store');
   // Student Management Routes (AdminStudentController)
   Route::get('/admin/students', [AdminStudentController::class, 'index'])
   ->name('admin.students.index');


   // Edit Student Route
   Route::get('/admin/students/edit_student/{student}', [AdminStudentController::class, 'edit'])
   ->name('admin.students.edit');
Route::put('/admin/students/edit_student/{student}', [AdminStudentController::class, 'update'])
   ->name('admin.students.update');


   // Student ID Cards Route
// View all student ID cards
Route::get('/admin/students/id-cards', [AdminStudentController::class, 'showIdCards'])
->name('admin.students.id-cards');

// Download a single student's ID card
Route::get('/admin/student/{student_id}/student-id-card', [AdminStudentController::class, 'downloadIdCard'])
->name('admin.students.downloadIdCard');

// View a specific student's ID card
Route::get('/admin/students/student-id-card/{student_id}', [AdminStudentController::class, 'viewIdCard'])
->name('admin.students.viewIdCard');

// Download multiple selected student ID cards
Route::post('/admin/students/download-selected-id-cards', [AdminStudentController::class, 'downloadSelectedIdCards'])
->name('admin.students.downloadSelectedIdCards');

// Student Post Route
Route::get('admin/posts/create-post', [AdminPostController::class, 'create'])->name('admin.posts.create_post');
Route::post('admin/posts/store-post', [AdminPostController::class, 'store'])->name('admin.posts.store_post');
Route::get('admin/posts/new-posts', [AdminPostController::class, 'index'])->name('admin.posts.new_posts');
//::get('admin/posts/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit_edit');
//Route::get('admin/posts/edit_posts', [AdminPostController::class, 'update'])->name('admin.posts.update_post');
Route::get('admin/posts/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
Route::put('admin/posts/{id}', [AdminPostController::class, 'update'])->name('admin.posts.update');

    // Fees Routes
    Route::get('admin/fees', [AdminFeeController::class, 'index'])->name('admin.fees.index');
    Route::get('admin/fees/{student_id}', [AdminFeeController::class, 'show'])->name('admin.fees.show');
    Route::get('admin/fees/add/{student_id}', [AdminFeeController::class, 'addStudentFees'])->name('admin.add_fees');
    Route::post('admin/fees/store', [AdminFeeController::class, 'saveStudentFee'])->name('admin.save_student_fee');
  // For editing fee records
Route::get('admin/fees/{fee}/edit', [AdminFeeController::class, 'edit'])->name('admin.fees.edit');
Route::put('admin/fees/{fee}', [AdminFeeController::class, 'update'])->name('admin.fees.update');
    Route::delete('admin//fees/{id}', [AdminFeeController::class, 'destroy'])->name('admin.fees.destroy');
    //Route::get('admin/search-fees', [FeeController::class, 'search'])->name('search.fees');
    Route::put('admin/fees/update/{student_id}', [AdminFeeController::class, 'updateStudentFees'])->name('admin.fees.updateStudentFees');
    Route::put('admin/fees/updateCourse/{student_id}', [AdminFeeController::class, 'updateCourse'])->name('admin.fees.updateCourse');
    Route::put('admin/fees/{student_id}/update-total-fees', [AdminFeeController::class, 'updateTotalFees'])->name('admin.updateTotalFees');


  // Certificate Routes
  Route::get('admin/certificates', [AdminCertificateController::class, 'index'])->name('admin.certificates.index');
  Route::get('admin/certificate/view/{id}', [AdminCertificateController::class, 'viewCertificate'])->name('admin.certificates.view');
  Route::post('admin/certificates/download-selected', [AdminCertificateController::class, 'downloadSelected'])->name('admin.certificates.downloadSelected');
  Route::get('admin/certificates/select_certificates', [AdminCertificateController::class, 'selectCertificates'])->name('admin.certificates.select');
  Route::get('admin/certificate-search', [AdminCertificateController::class, 'search'])->name('admin.certificate.search');
  Route::get('admin/certificates/selectsearch', [AdminCertificateController::class, 'selectSearch'])->name('admin.certificate.selectsearch');


});

// Teacher Routes
Route::middleware(['auth', 'role:teacher'])->get('/teacher', function () {
    return view('teacher.index');
})->name('teacher.dashboard');

// Student Routes
Route::middleware(['auth', 'role:student'])->get('/student', function () {
    return view('students.index');
})->name('student.dashboard');

// Excel Import Routes
Route::get('/import-excel', [ExcelImportController::class, 'import']);
Route::get('/import-courses', [ExcelImportController::class, 'importCourses']);

// Student Import Route
Route::post('students/import', [StudentController::class, 'import'])->name('students.import');
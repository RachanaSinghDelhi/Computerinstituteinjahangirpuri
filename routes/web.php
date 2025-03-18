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
use App\Http\Controllers\Teacher\StudentController as TeacherStudentController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\FeeController as AdminFeeController;
use App\Http\Controllers\Admin\CertificateController as AdminCertificateController;
use App\Http\Controllers\Admin\ExpenseController as AdminExpenseController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\StudentVersionController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Http\Controllers\FeeVersionController; 
use App\Http\Controllers\PaymentController; 
use App\Http\Controllers\Teacher\FeeVersionController as TeacherFeeVersionController;
use App\Http\Controllers\Teacher\AttendanceController as TeacherAttendanceController;
use App\Http\Controllers\Teacher\AssignmentController as TeacherAssignmentController;
use App\Http\Controllers\Teacher\ProfileController as TeacherProfileController;
use App\Http\Controllers\Teacher\NotificationController as TeacherNotificationController ;
use App\Http\Controllers\Students\ProfileController as StudentsProfileController;
use App\Http\Controllers\Students\FeesController as StudentsFeesController;

Route::middleware(['auth', 'role:student'])->prefix('student')->group(function () {
    Route::get('/fees', [StudentsFeesController::class, 'index'])->name('student.fees');
    Route::get('/pay_fees', [StudentsFeesController::class, 'payfees'])->name('student.pay.fees');
    Route::post('/store_payment', [StudentsFeesController::class, 'storePayment'])->name('student.store.payment');

});


//payment details submit by students
Route::middleware(['auth', 'role:super_admin'])->prefix('dashboard')->group(function () {
  Route::get('/payments', [PaymentController::class, 'index'])->name('list.payments');
    Route::put('/payments/approve/{id}', [PaymentController::class, 'approve'])->name('admin.approve.payment');
});


Route::middleware(['auth', 'role:student'])->prefix('student')->group(function () {
Route::get('/profile', [StudentsProfileController::class, 'profile'])->name('student.profile');
Route::post('/batch/change/request/{studentId}', [StudentsProfileController::class, 'requestBatchChange'])->name('batch.change.request');
Route::get('/admin/batch-change-requests', [AdminController::class, 'viewBatchRequests'])->name('batch.requests');
Route::get('/batch/approve/{id}', [AdminController::class, 'approveBatchChange'])->name('batch.approve');
Route::get('/batch/reject/{id}', [AdminController::class, 'rejectBatchChange'])->name('batch.reject');

});


Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->group(function () {
  
    Route::get('/profile', [TeacherProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile/update/{id}', [TeacherProfileController::class, 'update'])->name('profile.update');
});
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->group(function () {
  


      Route::get('/teacher/notifications', [TeacherNotificationController ::class, 'getNotifications'])->name('teacher.notifications');
      Route::post('/teacher/notifications/markAsRead', [TeacherNotificationController ::class, 'markAsRead'])->name('teacher.notifications.markAsRead');
      Route::get('/teacher/notifications/index', [TeacherNotificationController ::class, 'index'])->name('teacher.notifications.index');

  
});



Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->group(function () {

  
    Route::get('/assignments', [TeacherAssignmentController::class, 'index'])->name('teacher.assignments.index');
    Route::get('/assignments/add', [TeacherAssignmentController::class, 'create'])->name('teacher.assignments.add');
    Route::post('/assignments/store', [TeacherAssignmentController::class, 'store'])->name('teacher.assignments.store');
    Route::get('/assignments/edit/{id}', [TeacherAssignmentController::class, 'edit'])->name('teacher.assignments.edit');
    Route::put('/assignments/update/{id}', [TeacherAssignmentController::class, 'update'])->name('teacher.assignments.update');
    Route::delete('/assignments/delete/{id}', [TeacherAssignmentController::class, 'destroy'])->name('teacher.assignments.delete');
});

 // Student Attendance Routes
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->group(function () {
  Route::get('/students/filter', [TeacherAttendanceController::class, 'filter'])->name('attendance.filter');
  Route::get('/attendance/batchwise', [TeacherAttendanceController::class, 'batchWiseAttendanceReport'])->name('attendance.batchwiseReport');

  Route::patch('/attendance/update-batch', [TeacherAttendanceController::class, 'updateBatch'])->name('attendance.update_batch');

    Route::get('/attendance', [TeacherAttendanceController::class, 'index'])->name('teacher.attendance.index');
    Route::post('/attendance/mark', [TeacherAttendanceController::class, 'markAttendance'])->name('teacher.attendance.mark');
});




Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->group(function (){
  Route::get('/teacher/fees', [TeacherFeeVersionController::class, 'fees'])->name('teacher.fees');
  Route::get('/fees/details/{student_id}', [TeacherFeeVersionController::class, 'feesDetails'])->name('teacher.fees.detail');
  Route::get('/fees/create/{student_id}', [TeacherFeeVersionController::class, 'create'])->name('teacher.fees.create');
  Route::post('/fees/store', [TeacherFeeVersionController::class, 'store'])->name('teacher.fees.store');
  Route::get('/fees', [TeacherFeeVersionController::class, 'index'])->name('teacher.fees.index');
  Route::get('/pending-fees', [TeacherFeeVersionController::class, 'pendingFees'])->name('teacher.fees.pending');
  Route::get('/fees/edit/{id}', [TeacherFeeVersionController::class, 'edit'])->name('teacher.fees.edit');

  Route::put('/fees/update/{id}', [TeacherFeeVersionController::class, 'update'])->name('teacher.fees.update');
  Route::post('/fees/approve/{id}', [TeacherFeeVersionController::class, 'approve'])->name('teacher.fees.approve');
});

//receipt detail submit by reachers
Route::middleware(['auth', 'role:super_admin'])->prefix('dashboard')->group(function () {
    Route::get('/pending-fees', [FeeVersionController::class, 'index'])->name('approve.fees.index');
    Route::post('/approve-fee/{id}', [FeeVersionController::class, 'approve'])->name('pending.fees.approve');
    Route::delete('/reject-fee/{id}', [FeeVersionController::class, 'reject'])->name('pending.fees.reject');
});




//Route::get('/logout', Logout::class)->name('logout');

Route::get('/user-logout', Logout::class)->name('user.logout');

// Livewire Login Page
Route::get('/login', Login::class)->name('login');




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
Route::get('/terms-and-conditions', [PageController::class, 'terms'])->name('terms');

Route::get('/introduction', [PageController::class, 'showIntroductionPage'])->name('introduction.page');
// Single Post Route
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

/* Login and Logout Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('superadmin/logout', [LoginController::class, 'logout'])->name('superadminlogout');*/

// Admin Login Routes
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login']);
Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Super Admin Routes
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/superadmin', function () {
        return view('dashboard.index');
    })->name('superadmin.dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
  
    // Dashboard Prefix Routes
    Route::middleware(['auth', 'role:super_admin'])->prefix('dashboard')->group(function () {

      Route::get('/admin/batch-change-requests', [StudentVersionController::class, 'viewBatchRequests'])->name('batch.requests');
      

      Route::get('/notifications', [StudentVersionController::class, 'getNotifications'])->name('notifications');

      
      Route::post('/students/update-course-status', [StudentController::class, 'updateCourseStatus'])->name('students.update_course_status');


      // Students Routes
      Route::get('/super_admin/student-approvals', [StudentVersionController::class, 'index'])->name('super_admin.student-approvals');
      Route::post('/super_admin/student-approvals/{id}/approve', [StudentVersionController::class, 'approve'])->name('super_admin.student-approve');
      Route::post('/super_admin/student-approvals/{id}/reject', [StudentVersionController::class, 'reject'])->name('super_admin.student-reject');
        // Fees Routes
        Route::get('/fees', [FeeController::class, 'index'])->name('fees.index');
        Route::get('/fees/{student_id}', [FeeController::class, 'show'])->name('fees.show');
        Route::get('/fees/add/{student_id}', [FeeController::class, 'addStudentFees'])->name('add_fees');
        Route::post('/fees/store', [FeeController::class, 'saveStudentFee'])->name('save_fee');
      // For editing fee records
Route::get('fees/{fee}/edit', [FeeController::class, 'edit'])->name('fees.edit');
Route::put('fees/{fee}', [FeeController::class, 'update'])->name('fees.update');
        Route::delete('/fees/{id}', [FeeController::class, 'destroy'])->name('fees.destroy');
        Route::get('/search-fees', [FeeController::class, 'search'])->name('search.fees');
        Route::put('/fees/update/{student_id}', [FeeController::class, 'updateStudentFees'])->name('fees.updateStudentFees');
        Route::put('/fees/updateCourse/{student_id}', [FeeController::class, 'updateCourse'])->name('fees.updateCourse');
        Route::put('/fees/{student_id}/update-total-fees', [FeeController::class, 'updateTotalFees'])->name('updateTotalFees');
        
        Route::get('/fees-received', [FeeController::class, 'received'])->name('fees.received');
        Route::get('/fees-pending', [FeeController::class, 'pending'])->name('fees.pending');
        



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
        Route::get('/certificate/searchCertificate', [CertificateController::class, 'searchCertificate'])->name('certificate.searchCertificate');
        Route::get('/certificates/download/{student_id}', [CertificateController::class, 'downloadSingle'])->name('certificates.downloadSingle');


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
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/add-active-students', [UserController::class, 'addActiveStudentsToUsers'])
    ->name('students.addActive');

    Route::resource('expenses', ExpenseController::class)->names([
      'index' => 'superadmin.expenses.index',
      'create' => 'superadmin.expenses.create',
      'store' => 'superadmin.expenses.store',
      'edit' => 'superadmin.expenses.edit',
      'update' => 'superadmin.expenses.update',
      'destroy' => 'superadmin.expenses.destroy',
      'show' => 'superadmin.expenses.show',
  ]);
   

});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->get('/admin', function () {
    return view('admin.index');
})->name('admin.dashboard');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
  
    Route::get('/admin-admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::patch('/admin/students/bulk-update-status', [AdminStudentController::class, 'bulkUpdateStatus'])
    ->name('admin.students.bulkUpdateStatus');

    // Individual status update
Route::patch('admin/students/update-status/{student}', [AdminStudentController::class, 'updateStatus'])
->name('admin.students.updateStatus');

Route::get('admin/students/search', [AdminStudentController::class, 'search'])->name('admin.students.search');
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
    
    Route::get('admin/fees-received', [AdminFeeController::class, 'received'])->name('admin.fees.received');
    Route::get('admin/fees-pending', [AdminFeeController::class, 'pending'])->name('admin.fees.pending');




  // Certificate Routes
  Route::get('admin/certificates', [AdminCertificateController::class, 'index'])->name('admin.certificates.index');
  Route::get('admin/certificate/view/{id}', [AdminCertificateController::class, 'viewCertificate'])->name('admin.certificates.view');
  Route::post('admin/certificates/download-selected', [AdminCertificateController::class, 'downloadSelected'])->name('admin.certificates.downloadSelected');
  Route::get('admin/certificates/select_certificates', [AdminCertificateController::class, 'selectCertificates'])->name('admin.certificates.select');
  Route::get('admin/certificate-search', [AdminCertificateController::class, 'search'])->name('admin.certificate.search');
  Route::get('admin/certificates/selectsearch', [AdminCertificateController::class, 'selectSearch'])->name('admin.certificate.selectsearch');
  Route::get('admin/certificate/searchCertificate', [AdminCertificateController::class, 'searchCertificate'])->name('admin.certificate.searchCertificate');
  Route::get('admin/certificates/download/{student_id}', [AdminCertificateController::class, 'downloadSingle'])->name('admin.certificates.downloadSingle');
//expenses

Route::resource('admin/expenses', AdminExpenseController::class)->names([
  'index' => 'admin.expenses.index',
  'create' => 'admin.expenses.create',
  'store' => 'admin.expenses.store',
  'edit' => 'admin.expenses.edit',
  'update' => 'admin.expenses.update',
  'destroy' => 'admin.expenses.destroy',
  'show' => 'admin.expenses.show',
]);
  
  
});


Route::middleware(['auth', 'role:admin'])->get('/admin', function () {
  return view('admin.index');
})->name('admin.dashboard');

// Admin Routes
Route::middleware(['auth', 'role:teacher'])->group(function () {
  Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.dashboard');
  Route::patch('/teacher/students/bulk-update-status', [TeacherStudentController::class, 'bulkUpdateStatus'])
  ->name('teacher.students.bulkUpdateStatus');

  // Individual status update
Route::patch('teacher/students/update-status/{student}', [TeacherStudentController::class, 'updateStatus'])
->name('teacher.students.updateStatus');

Route::get('teacher/students/search', [TeacherStudentController::class, 'search'])->name('teacher.students.search');
// Add Student Routes
Route::get('/teacher/students/add', [TeacherStudentController::class, 'create'])
->name('teacher.students.add');
Route::post('/teacher/students/add', [TeacherStudentController::class, 'store'])
->name('teacher.students.store');
 // Student Management Routes (TeacherStudentController)
 Route::get('/teacher/students', [TeacherStudentController::class, 'index'])
 ->name('teacher.students.index');


 // Edit Student Route
 Route::get('/teacher/students/{student}/edit', [TeacherStudentController::class, 'edit'])
 ->name('teacher.students.edit');
Route::put('/teacher/students/edit_student/{student}', [TeacherStudentController::class, 'update'])
 ->name('teacher.students.update');
});
// Teacher Routes

// Student Routes
Route::middleware(['auth', 'role:student'])->get('/student', function () {
    return view('students.index');
})->name('student.dashboard');

// Excel Import Routes
Route::get('/import-excel', [ExcelImportController::class, 'import']);
Route::get('/import-courses', [ExcelImportController::class, 'importCourses']);

// Student Import Route
Route::post('students/import', [StudentController::class, 'import'])->name('students.import');
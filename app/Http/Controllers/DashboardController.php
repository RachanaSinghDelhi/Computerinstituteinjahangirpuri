<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\StudentFeesStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Student;
use App\Models\Fee;

class DashboardController extends Controller
{
   
   /*  public function index()
     {
         $courselist = Course::all();
        return view('dashboard.index'); // Pass 'courses' to view
      }
    */
    

     
   
          public function index()
          {
              $currentMonth = Carbon::now()->month;
              $currentYear = Carbon::now()->year;
      
              // Fetch total fees received
              $totalFeesReceived = Fee::sum('amount_paid');


 //Fetch total fees received this month
 $currentMonthStart = Carbon::now()->startOfMonth()->toDateString();
    $currentMonthEnd = Carbon::now()->endOfMonth()->toDateString();
              $totalFeesPaidThisMonth = DB::table('fees')
        ->whereBetween('payment_date', [$currentMonthStart, $currentMonthEnd])
        ->where('status', 'Paid') // Only count fully paid fees
        ->sum('amount_paid');
      
              // Fetch fees pending for the current month
              $feesPending = Fee::join('student_fees_status', 'fees.student_id', '=', 'student_fees_status.student_id')
              ->whereMonth('fees.due_date', $currentMonth)
              ->whereYear('fees.due_date', $currentYear)
              ->where('student_fees_status.status', 'pending')
              ->sum('fees.amount_paid');

              // Fetch total active students
              $activeStudents = Student::where('status', 'active')->count();
      
              // Fetch new enrollments this month
              $newEnrollments = Student::whereMonth('created_at', $currentMonth)
                                       ->whereYear('created_at', $currentYear)
                                       ->count();
      
                 // Fetch completed or left students per month
        $completedOrLeftStudents = Student::select(DB::raw("COUNT(id) as total"), DB::raw("MONTH(updated_at) as month"))
        ->whereIn('status', ['completed', 'left'])
        ->groupBy(DB::raw("MONTH(updated_at)"))
        ->pluck('total', 'month')->toArray();
      
              // Fetch monthly fees received for graph
              $monthlyFees = Fee::selectRaw('MONTH(due_date) as month, SUM(amount_paid) as total')
                                ->whereYear('due_date', $currentYear)
                                ->groupBy('month')
                                ->pluck('total', 'month')
                                ->toArray();
      
              // Fetch monthly student enrollments for graph
              $monthlyEnrollments = Student::selectRaw('MONTH(created_at) as month, COUNT(id) as total')
                                           ->whereYear('created_at', $currentYear)
                                           ->groupBy('month')
                                           ->pluck('total', 'month')
                                           ->toArray();

                                           $currentDate = Carbon::now()->toDateString(); // Get today's date

                                           $overdueFees = DB::table('student_fees_status as sfs')
                                               ->join('fees as f', function ($join) {
                                                   $join->on('sfs.student_id', '=', 'f.student_id')
                                                        ->on('sfs.course_id', '=', 'f.course_id'); // Match both student and course
                                               })
                                               ->join('students as s', 'sfs.student_id', '=', 's.student_id') // Get student details
                                               ->select(
                                                   's.student_id',
                                                   's.name as student_name',
                                                   's.status as student_status',
                                                   'f.due_date',
                                                   'sfs.status as fee_status', // Status from student_fees_status
                                                   'f.amount_paid',
                                                   'sfs.fees_due'
                                               )
                                               ->where('s.status', 'Active') // Only active students
                                               ->whereDate('f.due_date', '<=', $currentDate) // Fees due date is today or past
                                               ->where('sfs.status', 'Pending') // Ensure fees status is still pending
                                               ->orderBy('f.due_date', 'asc')
                                               ->get();
                                       
                                       
        
    
              return view('dashboard.index', compact(
                  'totalFeesReceived', 
                  'feesPending', 
                  'activeStudents', 
                  'newEnrollments', 
                  'completedOrLeftStudents', 
                  'monthlyFees', 
                  'monthlyEnrollments',
                  'overdueFees',
                  'totalFeesPaidThisMonth'
              ));


         

   
          }





 
      

}

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
   
       // public function index()
       // {
       //     $courselist = Course::all();
        //    return view('dashboard.index', compact('courselist')); // Pass 'courses' to view
      //  }
    
    

     
      
     
          public function index()
          {
              $currentMonth = Carbon::now()->month;
              $currentYear = Carbon::now()->year;
      
              // Fetch total fees received
              $totalFeesReceived = Fee::sum('amount_paid');
      
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
      
              // Fetch students who completed/left this month
              $completedOrLeftStudents = Student::whereMonth('updated_at', $currentMonth)
                                                ->whereYear('updated_at', $currentYear)
                                                ->whereIn('status', ['completed', 'left'])
                                                ->count();
      
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

                                           // Fetch students with pending fees that are overdue
                                           $overdueFees = DB::table('student_fees_status as sfs')
                                               ->join('fees as f', function ($join) {
                                                   $join->on('sfs.student_id', '=', 'f.student_id')
                                                        ->on('sfs.course_id', '=', 'f.course_id'); // Match both student and course
                                               })
                                               ->select(
                                                   'f.due_date', 
                                                   'sfs.status as fee_status', // Status from student_fees_status
                                                   'sfs.student_id', 
                                                   'sfs.student_name', 
                                                   'f.amount_paid', 
                                                   'sfs.fees_due'
                                               )
                                               ->whereDate('f.due_date', '<=', $currentDate) // Fees due date is today or past
                                               ->where('sfs.status', 'Pending') // Ensure fees status is still pending
                                               ->get();
                                       
        
    
              return view('dashboard.index', compact(
                  'totalFeesReceived', 
                  'feesPending', 
                  'activeStudents', 
                  'newEnrollments', 
                  'completedOrLeftStudents', 
                  'monthlyFees', 
                  'monthlyEnrollments',
                  'overdueFees'
              ));


         

   
          }






 
      

}

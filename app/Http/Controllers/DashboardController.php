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


          $currentDate = Carbon::now(); // Today's date

                                           // Fetch students with overdue fees
                                         
       $currentDate = Carbon::now(); // Get today's date
                                           
                                               // Fetch overdue students with due date from fees table and status from student_fees_status table
   $overdueFees = DB::table('fees as f')
       ->join('student_fees_status as sfs', 'f.student_id', '=', 'sfs.student_id')
       ->join('students as s', 'f.student_id', '=', 's.id')
       ->select('f.due_date', 'sfs.status', 's.id as student_id', 's.name')
       ->where('f.due_date', '<', $currentDate) // Due date has passed
          ->where('sfs.status', 'pending') // Fee is still pending
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

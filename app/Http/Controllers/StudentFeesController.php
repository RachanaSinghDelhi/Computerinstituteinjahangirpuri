<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Student;
use App\Models\Fee;

class StudentFeesController extends Controller
{
    public function index()
    {
        // Fetch data from the student_fees_status view
        $studentFees = DB::table('student_fees_status')->paginate(20);

        // Pass the data to the fee view
        return view('dashboard.fees.fees', compact('studentFees'));
    }



public function singleFees($student_id)
{
    // Ensure the student exists
    $student = Student::findOrFail($student_id);
    
    // Get fees for this student
    $fees = Fees::where('student_id', $student_id)->get();
    
    // Return the view with student and fees data
    return view('dashboard.fees.single_fees', compact('student', 'fees'));
}



   public function create($student_id)
    {

  
        // Fetch the student using student_id
        $student_id = (int) $student_id;
        $student = Student::findOrFail($student_id);
    
        $course = $student->course;
        
        // Calculate the monthly installment
        $defaultInstallmentAmount = round($course->total_fees / $course->installments);
    
        // Fetch the last receipt number and increment
        $lastReceipt = Fee::latest('receipt_number')->first();
        $receiptNumber = $lastReceipt ? $lastReceipt->receipt_number + 1 : 1;
    
        // Return the view with necessary data
        return view('dashboard.fees.add_fees', compact('student', 'defaultInstallmentAmount', 'receiptNumber'));
    }
}
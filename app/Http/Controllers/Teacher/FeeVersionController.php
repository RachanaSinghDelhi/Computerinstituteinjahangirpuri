<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\FeeVersion;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Course;
use App\Models\StudentFeesStatus;
use Carbon\Carbon;

class FeeVersionController extends Controller
{
    // Show add fee form
    public function create($student_id)
{
    
    try {
        $student = Student::findOrFail($student_id);
        //rest of your code.
    } catch (ModelNotFoundException $e) {
        // Handle the case where the student is not found
        return redirect()->back()->withErrors(['message' => 'Student not found.']);
    }

// Fetch the course details
$course = Course::find($student->course_id);

if (!$course) {
    return redirect()->back()->withErrors(['message' => 'Course not found for this student.']);
}
    $lastInstallment = FeeVersion::where('student_id', $student_id)->max('installment_no') ?? 0;
    $nextInstallmentNo = $lastInstallment + 1;
    $lastReceipt = FeeVersion::max('receipt_number') ?? 1000;
    $nextReceiptNumber = $lastReceipt + 1;
 // Fetch the student fee status details
 $studentFeesStatus = StudentFeesStatus::where('student_id', $student_id)->first();
    return view('teacher.fees.add_fees', compact('student','studentFeesStatus','course', 'nextInstallmentNo', 'nextReceiptNumber'));
}


    // Store fees in pending_fees table
    public function store(Request $request)
    {
            try {
                \Log::info('Request Data: ', $request->all());
        
                // Retrieve student
                $student = Student::find($request->student_id);
                if (!$student) {
                    return redirect()->back()->with('error', 'Invalid student ID.');
                }
        
                // Retrieve course
                $course = Course::find($student->course_id);
                if (!$course) {
                    return redirect()->back()->with('error', 'Invalid course.');
                }
        
                // Get the next installment number
                $lastInstallment = FeeVersion::where('student_id', $request->student_id)->max('installment_no');
                $nextInstallmentNo = $lastInstallment ? $lastInstallment + 1 : 1;
        
                // Set fee status
                $feeStatus = ($request->balances > 0) ? 'Unpaid' : 'Paid';
        
                // Store in fee_version (Pending Approval)
                $feeVersion = new FeeVersion();
                $feeVersion->student_id = $student->student_id;
                $feeVersion->course_id = $course->id;
                $feeVersion->amount_paid = $request->amount_paid;
                $feeVersion->payment_date = $request->payment_date;
                $feeVersion->due_date = $request->due_date;
                $feeVersion->balances = $request->balances;
                $feeVersion->receipt_number = $request->receipt_number;
                $feeVersion->receipt_image = $request->receipt_image ?? 'default.jpg';
                $feeVersion->installment_no = $nextInstallmentNo;
                $feeVersion->added_by = Auth::id();
                $feeVersion->status = $feeStatus;
                $feeVersion->approved = 0; // Set as pending
                $feeVersion->save();
        
                return redirect()->route('teacher.fees.index')->with('success', 'Fee record added for approval.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
            }
        }
        
        
    // Display all fees (approved + pending)
    public function index()
    {
        $pendingFees = FeeVersion::with(['student', 'course'])->get();
        $approvedFees = Fee::with(['student', 'course'])->get();
        
    
        return view('teacher.fees.index', compact('approvedFees', 'pendingFees'));
    }
    
    // Show edit form for pending fees
    public function edit($id)
    {
        $fee = FeeVersion::findOrFail($id);
        return view('teacher.fees.edit_fees', compact('fee'));
    }

    // Update pending fee
    public function update(Request $request, $id)
    {
        $request->validate([
            'amount_paid' => 'required|numeric',
            'installment_no' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        $pendingFee = FeeVersion::findOrFail($id);
        $pendingFee->update($request->all());

        return redirect()->route('teacher.fees.index')->with('success', 'Pending fee updated.');
    }
}

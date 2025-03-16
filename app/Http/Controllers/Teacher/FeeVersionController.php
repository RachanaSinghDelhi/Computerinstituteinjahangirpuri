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
        
               // Get the next installment number (allow user input, fallback to default)
$lastInstallment = FeeVersion::where('student_id', $request->student_id)->max('installment_no');
$nextInstallmentNo = $request->installment_no ?? ($lastInstallment ? $lastInstallment + 1 : 1);
        
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
                $feeVersion->receipt_image = "{$request->receipt_number}.jpg"; // Just inserting the name
                $feeVersion->installment_no = $nextInstallmentNo;
                $feeVersion->added_by = Auth::id();
                $feeVersion->status = $feeStatus;
                $feeVersion->approved = 0; // Set as pending
                $feeVersion->save();
        
                return redirect()->route('teacher.fees.fees')->with('success', 'Fee record added for approval.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
            }
        }
        
        
    // Display all fees (approved + pending)
    public function index()
    {
        $pendingFees = FeeVersion::with(['student', 'course'])->get();
        $approvedFees = Fee::with(['student', 'course'])->get();
        
    
        return view('teacher.fees.fees', compact('approvedFees', 'pendingFees'));
    }
    
    // Show edit form for pending fees
    public function edit($id)
    {
        $fee = FeeVersion::find($id); // Fetch by unique ID
    
        if (!$fee) {
            return redirect()->back()->with('error', 'Fee record not found.');
        }
    
        return view('teacher.fees.edit_fees', compact('fee'));
    }
    

    // Update pending fee
    public function update(Request $request, $id)
    {
        $request->validate([
            'installment_no' => 'required|integer',
            'amount_paid' => 'required|numeric',
            'balances' => 'nullable|numeric',
            'payment_date' => 'required|date',
            'receipt_number' => 'required|string|max:255',
        ]);
    
        // Find the record by unique ID
        $feeVersion = FeeVersion::findOrFail($id);
    
        // Check if the new installment number already exists for this student (excluding the current record)
        $existingInstallment = FeeVersion::where('student_id', $feeVersion->student_id)
            ->where('installment_no', $request->installment_no)
            ->where('id', '!=', $id)
            ->exists();
    
        if ($existingInstallment) {
            return redirect()->back()->with('error', 'This installment number already exists for this student.');
        }
    
        // Check if the receipt number already exists (excluding the current record)
        $existingReceipt = FeeVersion::where('receipt_number', $request->receipt_number)
            ->where('id', '!=', $id)
            ->exists();
    
        if ($existingReceipt) {
            return redirect()->back()->with('error', 'This receipt number is already used.');
        }
    
        // Update the FeesVersion record
        $feeVersion->update([
            'installment_no' => $request->installment_no,
            'amount_paid' => $request->amount_paid,
            'balances' => $request->balances,
            'payment_date' => $request->payment_date,
            'receipt_number' => $request->receipt_number,
        ]);
    
        return redirect()->back()->with('success', 'Fee record updated successfully.');
    }
    

    public function fees()
    {
        // Get Pending Fees: Students in `fees` but NOT in `fees_version`
        $pendingFees = FeeVersion::with('student', 'course')
        ->where('approved', 0) // Only fetch records where approved is 0 (not yet approved)
        ->get();
    
         


        $approvedFees = StudentFeesStatus::with([
            'student' => function ($query) {
                $query->where('status', 'active'); // Fetch only active students
            },
            'course'
        ])
        
        ->get()
        ->filter(function ($status) {
            return $status->student !== null; // Ensure only records with active students are included
        })
        ->map(function ($status) {
            // Get max installment number from the fees table, default to 0 if null
            $maxInstallment = Fee::where('student_id', $status->student_id)->max('installment_no') ?? 0;
    
            // Calculate total balance for the student
            $totalBalance = Fee::where('student_id', $status->student_id)->sum('balances') ?? 0;

             // Calculate total balance for the student
         // Get last updated timestamp
         $lastUpdatedTimestamp = Fee::where('student_id', $status->student_id)
         ->latest('updated_at')
         ->value('updated_at') ?? 'N/A';
    
         
            return (object) [
                'student_id' => $status->student_id,
                'student_name' => $status->student->name,
                'course_title' => $status->course->course_title ?? 'N/A',
                'installment_no' => $maxInstallment,
                'total_balance' => $totalBalance,
                'status' => 'Approved',
                'doa' => $status->doa, // Date of Admission
                'last_updated' => $lastUpdatedTimestamp, // Last updated timestamp
            ];
        });
    
    return view('teacher.fees.fees', compact('approvedFees', 'pendingFees'));
    
    }
    


    public function feesDetails($student_id)
    {
        // Get student details
        $student = Student::findOrFail($student_id);
    
        // Get fee details from the fees table for the given student
        $fees = Fee::where('student_id', $student_id)->get();
    
        return view('teacher.fees.fees_detail', compact('student', 'fees'));
    }
    


}

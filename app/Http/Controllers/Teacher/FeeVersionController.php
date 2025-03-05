<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeVersion;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Course;

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

    return view('teacher.fees.add_fees', compact('student','course', 'nextInstallmentNo', 'nextReceiptNumber'));
}

    // Store fees in pending_fees table
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'amount_paid' => 'required|numeric',
            'installment_no' => 'required|numeric',
            'payment_date' => 'required|date',
            'receipt_number' => 'required|numeric',
            'balances' => 'nullable|numeric',
        ]);
    dd($request);
        $data = $request->all();
        $data['added_by'] = auth()->user()->id; // Assign logged-in user ID
        $data['receipt_image'] = $request->receipt_number . '.jpg'; // Set receipt image name
    
        FeeVersion::create($data);
    
        return redirect()->route('teacher.fees.index')->with('success', 'Fee submitted for approval.');
    }
    

    // Display all fees (approved + pending)
    public function index()
    {
        $approvedFees = Fee::with('course')->get();
        $pendingFees = FeeVersion::with('student', 'course')->get(); // Ensure eager loading
    
        return view('teacher.fees.index', compact('approvedFees', 'pendingFees'));
    }
    
    // Show edit form for pending fees
    public function edit($id)
    {
        $pendingFee = FeeVersion::findOrFail($id);
        return view('teacher.fees.edit', compact('pendingFee'));
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

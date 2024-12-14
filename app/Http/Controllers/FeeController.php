<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    // List all students' fees
    public function index()
    {
        $students = Student::with(['course', 'fees'])->get();
        return view('dashboard.fees', compact('students'));
    }

    // Show fee details of a specific student
    public function show(Student $student)
    {
        $fees = $student->fees;
        return view('dashboard.single_fees', compact('student', 'fees'));
    }

    // Form to pay fees
    public function create(Student $student)
    {
        return view('dashboard.add_fees', compact('student'));
    }

    // Store fee payment
    public function store(Request $request, Student $student)
    {
        $request->validate([
            'amount_paid' => 'required|numeric|min:1',
            'receipt_image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        // Get the original file name (without the extension)
        $originalName = pathinfo($request->receipt_image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $request->receipt_image->getClientOriginalExtension();
    
        // Ensure the original file name is unique (if necessary)
        $uniqueName = $originalName.'.' . $extension;
    
        // Move the file to the "assets/receipts" directory
        $request->receipt_image->move(public_path('assets/receipts'), $uniqueName);
    
        // Save fee record in the database
        Fee::create([
            'student_id' => $student->id,
            'course_id' => $student->course->id,
            'amount_paid' => $request->amount_paid,
            'payment_date' => now(),
            'receipt_number' =>$originalName , // Store the original file name as receipt number
            'receipt_image' =>  $uniqueName, // Save the full file name (including timestamp and extension)
            'status' => 'Paid',
        ]);
    
        return redirect()->route('fees.show', $student->id)->with('success', 'Fee payment recorded successfully!');
    }
}
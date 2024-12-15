<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Fee;
use Carbon\Carbon;
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
        $course = $student->course;
        $installmentAmount = $course->total_fees / $course->installments;
        return view('dashboard.single_fees', compact('student', 'fees','installmentAmount'));
    }

    // Form to pay fees
    public function create(Student $student)
    {
        $course = $student->course;
    
        // Calculate the monthly installment
        $installmentAmount = $course->total_fees / $course->installments;
    
        return view('dashboard.add_fees', compact('student', 'installmentAmount'));
    }
    

  
    public function store(Request $request, Student $student)
    {
        // Fetch the student's course details
        $course = $student->course;
        $installmentAmount = $course->total_fees / $course->installments;
    
        // Validate the form input
        $request->validate([
            'amount_paid' => ['required', 'numeric', 'min:1', function ($attribute, $value, $fail) use ($installmentAmount) {
                if ($value != $installmentAmount) {
                    $fail('The amount to be paid must match the installment amount: ' . number_format($installmentAmount, 2));
                }
            }],
            'receipt_image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'payment_date' => 'required|date',
        ]);
    
        // Handle receipt image
        $originalName = pathinfo($request->receipt_image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $request->receipt_image->getClientOriginalExtension();
        $uniqueName = $originalName . '.' . $extension;
    
        // Move the uploaded receipt image to the desired location
        $request->receipt_image->move(public_path('assets/receipts'), $uniqueName);
    
        // Calculate the due date: 1 month after the current installment
        // Get the number of months since the admission date
        $monthsSinceAdmission = Fee::where('student_id', $student->id)->count() + 1; // Increment for next due
    
        // Ensure 'doa' (date of admission) is a valid Carbon instance
        $admissionDate = Carbon::parse($student->doa);
    
        // Calculate the due date based on the months since admission
        $dueDate = $admissionDate->addMonths($monthsSinceAdmission)->endOfMonth(); // Due date is end of month
    
        // Save fee record in the database
        Fee::create([
            'student_id' => $student->id,
            'course_id' => $course->id,
            'amount_paid' => $request->amount_paid,
            'payment_date' => $request->payment_date,
            'due_date' => $dueDate, // Save the calculated due date
            'receipt_number' => $originalName,
            'receipt_image' => $uniqueName,
            'status' => 'Paid',
        ]);
    
        // Redirect to the fee details page with success message
        return redirect()->route('fees.show', $student->id)->with('success', 'Fee payment recorded successfully!');
    }
    
}
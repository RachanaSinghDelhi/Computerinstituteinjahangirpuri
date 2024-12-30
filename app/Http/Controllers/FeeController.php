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
        $students = Student::with(['course', 'fees'])
        ->orderBy('id', 'desc') // Order by 'id' in ascending order
        ->paginate(10);
        return view('dashboard.fees.fees', compact('students'));
    }

    // Show fee details of a specific student
    public function show(Student $student)
    {
        $fees = $student->fees;
        $course = $student->course;
        $defaultInstallmentAmount = round($course->total_fees / $course->installments);
        return view('dashboard.fees.single_fees', compact('student', 'fees','defaultInstallmentAmount'));
    }

    // Form to pay fees
    public function create(Student $student)
    {
        $course = $student->course;
    
        // Calculate the monthly installment
      
        $defaultInstallmentAmount = round($course->total_fees / $course->installments);

        $lastReceipt = Fee::latest('receipt_number')->first();
        $receiptNumber = $lastReceipt ? $lastReceipt->receipt_number + 1 : 1; 
        return view('dashboard.fees.add_fees', compact('student', 'defaultInstallmentAmount','receiptNumber'));
    }
    

  
    public function store(Request $request, Student $student)
    {
        // Fetch the student's course details
        $course = $student->course;
        $defaultInstallmentAmount = round($course->total_fees / $course->installments);
    
        // Validate the form input
        $request->validate([
            'amount_paid' => ['required', 'numeric', 'min:1'],
            'installment_amount' => 'nullable|numeric|min:1',
            'receipt_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'payment_date' => 'required|date',
        ]);
    
        // Determine the installment amount (use custom if provided)
        $installmentAmount = $request->installment_amount ?: $defaultInstallmentAmount;
    
          // Fetch the last used receipt number and increment it
    if ($request->filled('receipt_number')) {
        $receiptNumber = $request->receipt_number; // Use the provided receipt number
    } else {
        $lastReceipt = Fee::latest('receipt_number')->first();
        $receiptNumber = $lastReceipt ? $lastReceipt->receipt_number + 1 : 1; // Increment based on the last receipt
    }
    
        // Handle receipt image
        if ($request->hasFile('receipt_image')) {
            $receiptImageName = $receiptNumber . '.' . $request->receipt_image->getClientOriginalExtension();
            $request->receipt_image->move(public_path('assets/receipts'), $receiptImageName);
        } else {
            $receiptImageName = $receiptNumber . '.jpg';
        }
    
       
 // Parse dates
$admissionDate = Carbon::parse($student->doa); // Admission date
$paymentDate = Carbon::parse($request->payment_date); // Payment date

// Admission day of the month
$admissionDay = $admissionDate->day;

// Calculate the due date
if ($paymentDate->day >= $admissionDay) {
    // Payment made on or after the admission day -> Due in the next month
    $dueDate = $paymentDate->copy()->addMonthNoOverflow()->setDay($admissionDay);
} else {
    // Payment made before the admission day -> Due in the current month
    $dueDate = $paymentDate->copy()->setDay($admissionDay);
}

// Handle edge cases for invalid days (e.g., 31st in February)
if (!$dueDate->isValid()) {
    $dueDate = $dueDate->lastOfMonth();
}



        // Set payment status based on the payment date
        $status = $paymentDate->isCurrentMonth() ? 'Paid' : 'Pending';
    
        // Save fee record in the database
        Fee::create([
            'student_id' => $student->id,
            'course_id' => $course->id,
            'amount_paid' => $request->amount_paid,
            'payment_date' => $request->payment_date,
            'due_date' => $dueDate, // Save the calculated due date
            'receipt_number' => $receiptNumber,
            'receipt_image' => $receiptImageName,
            'status' => $status,
        ]);
    
        // Redirect to the fee details page with success message
        return redirect()->route('fees.single_fees', $student->id)->with('success', 'Fee payment recorded successfully!');
    }
        


    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // Get students based on search query (adjust to your need)
        $students = Student::with(['course', 'fees'])
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('student_id', 'like', '%' . $query . '%')
            ->orWhereHas('course', function($q) use ($query) {
                $q->where('course_title', 'like', '%' . $query . '%');
            })
            ->paginate(10);  // Adjust pagination as needed
    
        // Return the filtered student rows
        return view('dashboard.fees.search_fees_table', compact('students'))->render();
    }



    public function edit($id)
{
    $fee = Fee::findOrFail($id);
     $fee->payment_date = $fee->payment_date ? \Carbon\Carbon::parse($fee->payment_date) : null;
    return view('dashboard.fees.edit_fees', compact('fee'));
}

public function destroy($id)
{
    $fee = Fee::findOrFail($id);
    $fee->delete();

    return redirect()->back()->with('success', 'Fee record deleted successfully!');
}




public function update(Request $request, $id)
{
    // Retrieve the fee record
    $fee = Fee::findOrFail($id);

    // Validate the input
    $validatedData = $request->validate([
        'receipt_number' => 'required|numeric|unique:fees,receipt_number,' . $fee->id,
        'amount_paid' => 'required|numeric',
        'receipt_image' => 'required|string|max:255',
        'payment_date' => 'required|date',
        'due_date' => 'nullable|date|after_or_equal:payment_date', // Optional field
    ]);

    // Update the fee record
    $fee->update([
        'receipt_number' => $validatedData['receipt_number'],
        'amount_paid' => $validatedData['amount_paid'],
        'receipt_image' => $validatedData['receipt_image'],
        'payment_date' => $validatedData['payment_date'],
        'due_date' => $validatedData['due_date'], // This will handle null values
    ]);

    // Redirect to the single fees page with the required student parameter
    return redirect(url()->previous())->with('success', 'Fee record updated successfully!');

}


    
}
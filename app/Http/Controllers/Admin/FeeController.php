<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\StudentFeesStatus;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class FeeController extends Controller
{
    public function index()
    {
        // Fetch all active students along with their course details
$activeStudents = DB::table('students')
->join('courses', 'students.course_id', '=', 'courses.id')
->where('students.status', 'active')
->select(
    'students.student_id',
    'students.name as student_name',
    'courses.id as course_id',
    'courses.course_name',
    'courses.total_fees',
    'courses.installments'
)
->get();

foreach ($activeStudents as $student) {
// Check if the student already exists in student_fees_status
$existingRecord = DB::table('student_fees_status')
    ->where('student_id', $student->student_id)
    ->first();

if (!$existingRecord) {
    // Insert new record into student_fees_status
    DB::table('student_fees_status')->insert([
        'student_id' => $student->student_id,
        'student_name' => $student->student_name,
        'course_id' => $student->course_id,
        'course_title' => $student->course_name,
        'total_fees' => $student->total_fees,
        'installments' => $student->installments,
        'fees_paid' => 0.00, // Initially no fees paid
        'fees_due' => $student->total_fees, // Full fees due
        'installments_paid' => 0, // Initially no installments paid
        'status' => 'Pending',
        'created_at' => now(),
        'updated_at' => now()
    ]);
}
}

// Retrieve fees data for display
$feesData = DB::table('students')
->join('courses', 'students.course_id', '=', 'courses.id')
->leftJoin('fees', 'students.student_id', '=', 'fees.student_id')
->leftJoin('student_fees_status', 'students.student_id', '=', 'student_fees_status.student_id')
->select(
    'students.student_id',
    'students.name as student_name',
    'courses.course_name',
    'courses.total_fees',
    'courses.installments',
    'courses.id as course_id',
    DB::raw('IFNULL(SUM(fees.amount_paid), 0) as fees_paid'),
    DB::raw('courses.total_fees - IFNULL(SUM(fees.amount_paid), 0) as fees_due'),
    DB::raw(
        "CASE 
            WHEN SUM(fees.amount_paid) >= courses.total_fees THEN 'Paid'
            WHEN MAX(fees.payment_date) >= CURDATE() AND SUM(fees.amount_paid) < courses.total_fees THEN 'Paid but Pending Next Month'
            ELSE 'Pending'
        END as status"
    ),
    DB::raw('MAX(fees.updated_at) as last_updated'),
    'student_fees_status.total_fees as student_total_fees',
    DB::raw('COUNT(fees.id) as installments_paid') // Counting the number of installments paid
)
->where('students.status', 'active')
->groupBy(
    'students.student_id',
    'students.name',
    'courses.course_name',
    'courses.total_fees',
    'courses.installments',
    'courses.id',
    'student_fees_status.total_fees'
)
->orderBy('last_updated', 'desc')
->orderBy('students.student_id', 'desc')
->get();

// Fetch available courses
$courses = DB::table('courses')->get();

return view('admin.fees.fees', compact('feesData', 'courses'));
    }

public function updateCourse(Request $request, $student_id)
{
    // Update the course for a student
    DB::table('students')
        ->where('student_id', $student_id)
        ->update(['course_id' => $request->course_id]);

    return redirect()->route('admin.fees.index')->with('success', 'Course updated successfully.');
}

public function updateTotalFees(Request $request, $student_id)
{
     
     // Validate the input to ensure it's a valid number
     $request->validate([
         'total_fees' => 'required|numeric|min:0',
     ]);
 
     // Update the total fees for the specific student in the student_fees_status table
     DB::table('student_fees_status')
         ->where('student_id', $student_id)
         ->update(['total_fees' => $request->total_fees]);
 
     // Retrieve the updated total fees to pass it back to the view
     $updatedFee = DB::table('student_fees_status')
                     ->where('student_id', $student_id)
                     ->value('total_fees');
 
     return redirect()->route('admin.fees.index')->with('success', 'Total Fees updated successfully.')->with('updatedFee', $updatedFee);
}



    public function show($student_id)
    {

      
        // Fetch the student details along with fees and courses
        $student = Student::with(['fees.course'])->where('student_id', $student_id)->first();
    
        if (!$student) {
            return redirect()->route('admin.fees.index')->with('error', 'Student not found.');
        }
    

            // Fetch total fees for the student from the student_fees_status table
    $totalFees = DB::table('student_fees_status')
    ->where('student_id', $student_id)
    ->value('total_fees');
        // Check if the student has any fees submitted
        $hasFees = $student->fees->isNotEmpty();
    
        // Pass the data to the view
        return view('admin.fees.single_fees', compact('student', 'hasFees','totalFees'));
    }

    
    

    public function addStudentFees($student_id)
{
    try {
        // Fetch the student details using the student_id
        $student = Student::where('student_id', $student_id)->first();
        if (!$student) {
            throw new \Exception('Student not found with the provided ID.');
        }

        // Fetch the student fee status details
        $studentFeesStatus = StudentFeesStatus::where('student_id', $student_id)->first();
          
        // Fetch course details 
        $course = Course::find($student->course_id);
        if (!$course) {
            throw new \Exception('Course details not found for the student.');
        }

        // Fetch the last receipt number and calculate the next receipt number
        $lastReceiptNumber = Fee::max('receipt_number') ?? 0;
        $nextReceiptNumber = $lastReceiptNumber + 1;

        // Pass all necessary data to the view
        return view('admin.fees.add_fees', compact(
            'studentFeesStatus',
            'student',
            'course',
            'nextReceiptNumber'
        ));
    } catch (\Exception $e) {
        // Redirect back with an error message
        return redirect()->route('admin.fees.index')->with('error', 'Error: ' . $e->getMessage());
    }
}

    
   
    public function saveStudentFee(Request $request)
{
    try {
        // Log the input request data
        \Log::info('Request Data: ', $request->all());

        // Retrieve student
        $student = Student::find($request->student_id);
        if (!$student) {
            \Log::error('Student not found with ID: ' . $request->student_id);
            return redirect()->back()->with('error', 'Invalid student ID.');
        }

        // Retrieve course ID from the student record
        if (!$student->course_id) {
            \Log::error('Course ID not assigned to student ID: ' . $request->student_id);
            return redirect()->back()->with('error', 'No course assigned to the selected student.');
        }

        $course = Course::find($student->course_id);
        if (!$course) {
            \Log::error('Course not found with ID: ' . $student->course_id);
            return redirect()->back()->with('error', 'Invalid course associated with the student.');
        }

        // Log payment info
        \Log::info('Proceeding to store fee for student: ' . $student->name);


         // Retrieve the latest installment number for the student
         $lastInstallment = Fee::where('student_id', $student->student_id)
         ->where('course_id', $course->id)
         ->max('installment_no');

     $nextInstallmentNo = $lastInstallment ? $lastInstallment + 1 : 1;

        // Create Fee entry
        $fee = new Fee();
        $fee->student_id = $student->student_id;
        $fee->course_id = $course->id; // Use course ID from the student's record
        $fee->amount_paid = $request->amount_paid;
        $fee->payment_date = $request->payment_date;
        $fee->due_date = $request->due_date;
        $fee->receipt_number = $request->receipt_number;
        $fee->receipt_image = $request->receipt_number . '.jpg'; // Default image name
        $fee->installment_no = $nextInstallmentNo; // Auto-increment installment number
        $fee->status = 'Paid';

        
        $fee->save();


        // Update StudentFeesStatus
        $studentFeesStatus = StudentFeesStatus::where('student_id', $student->student_id)
        ->where('course_id', $course->id)
        ->first();
        if ($studentFeesStatus) {
            $studentFeesStatus->fees_paid += $request->amount_paid;
            $studentFeesStatus->fees_due = $studentFeesStatus->total_fees - $studentFeesStatus->fees_paid;

            $studentFeesStatus->status = $studentFeesStatus->fees_due <= 0 ? 'Paid' : 'Paid but Pending Next Month';
            $studentFeesStatus->save();
        }

        \Log::info('Fee payment successfully added for student ID: ' . $student->student_id);
        return redirect()->route('admin.fees.index', ['student_id' => $student->student_id])
            ->with('success', 'Payment added successfully!');
    } catch (\Exception $e) {
        \Log::error('Error occurred: ' . $e->getMessage());
        return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
}

    

public function destroy($id)
{
    $fee = Fee::findOrFail($id);

    if ($fee) {
        $fee->delete();
        return redirect()->back()->with('success', 'Fee record deleted successfully.');
    }

    return redirect()->back()->with('error', 'Unable to delete fee record.');
}


// app/Http/Controllers/StudentController.php

/* app/Http/Controllers/StudentController.php
public function search(Request $request)
{
    $query = $request->input('query');

    // Filter fees data based on student_id or student_name
    $feesData = StudentFeesStatus::where('student_id', 'LIKE', "%{$query}%")
                    ->orWhere('student_name', 'LIKE', "%{$query}%")
                    ->get();

    // Return the filtered results as a partial view
    return view('dashboard.fees.search_fees_table', compact('feesData'));
}*/


// FeeController.php

public function edit(Fee $fee)
{
    return view('admin.fees.edit_fees', compact('fee'));
}

public function update(Request $request, Fee $fee)
{
    $validated = $request->validate([
        'installment_no' => 'required|integer|min:1',
        'amount_paid' => 'required|numeric|min:0',
        'payment_date' => 'required|date',
        'receipt_number' => 'required|string|max:50|unique:fees,receipt_number,' . $fee->id,
        'status' => 'required|in:Paid,Unpaid',
        'receipt_image' => 'nullable|file|max:2048|mimes:jpg,jpeg,png,pdf',
    ]);

    if ($request->hasFile('receipt_image')) {
        // Delete old receipt if exists
        if ($fee->receipt_image) {
            Storage::delete('public/receipts/' . $fee->receipt_image);
        }

        // Use new receipt_number for filename
        $file = $request->file('receipt_image');
        $filename = $request->receipt_number . '.jpg'; 

        // Convert and save the file as JPG
        if ($file->getClientOriginalExtension() !== 'jpg') {
            $image = Image::make($file)->encode('jpg', 90);
            Storage::put('public/receipts/' . $filename, $image);
        } else {
            $file->storeAs('public/receipts', $filename);
        }

        $validated['receipt_image'] = $filename;
    
    }

    $fee->update($validated);

    return redirect()->route('admin.fees.show', $fee->student_id)
        ->with('success', 'Fee record updated successfully');
}


public function uploadReceipts(Request $request)
{
    $request->validate([
        'startingNumber' => 'required|integer|min:1',
        'receipts' => 'required|array',
        'receipts.*' => 'file|mimes:jpg,png,pdf|max:2048', // Adjust file types and size as needed
    ]);

    $startingNumber = $request->input('startingNumber');
    $files = $request->file('receipts');
    $uploadPath = public_path('/storage/receipts');

    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    foreach ($files as $index => $file) {
        $fileName = ($startingNumber + $index) . '.' . $file->getClientOriginalExtension();
        $file->move($uploadPath, $fileName);
    }

    return redirect()->back()->with('success', 'Receipts uploaded successfully!');
}


}

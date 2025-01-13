<?php
namespace App\Http\Controllers;

use App\Models\StudentFeesStatus;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeeController extends Controller
{
    public function index()
{
    // Retrieve the fees data
    $feesData = DB::table('students')
        ->join('courses', 'students.course_id', '=', 'courses.id')
        ->leftJoin('fees', 'students.student_id', '=', 'fees.student_id')
        ->select(
            'students.student_id', // Student ID
            'students.name as student_name', // Student Name
            'courses.course_title', // Course Title
            'courses.total_fees', // Total Fees
            'courses.installments', // Installments
            'courses.id as course_id', // Course ID
            DB::raw('IFNULL(SUM(fees.amount_paid), 0) as fees_paid'), // Ensure fees_paid is 0 if no data exists
            DB::raw('courses.total_fees - IFNULL(SUM(fees.amount_paid), 0) as fees_due'), // Ensure fees_due calculation is correct
            DB::raw(
                "CASE 
                    WHEN SUM(fees.amount_paid) >= courses.total_fees THEN 'Paid'
                    WHEN MAX(fees.payment_date) >= CURDATE() AND SUM(fees.amount_paid) < courses.total_fees THEN 'Paid but Pending Next Month'
                    ELSE 'Pending'
                END as status" // Determine status
            )
        )
        ->where('students.status', 'active') // Only active students
        ->groupBy(
            'students.student_id',
            'students.name',
            'courses.course_title',
            'courses.total_fees',
            'courses.installments',
            'courses.id'// Ensure that course_id is included in the group
        )
        ->get();

    // Sync the data to the student_fees_status table
    foreach ($feesData as $fee) {
        DB::table('student_fees_status')->updateOrInsert(
            ['student_id' => $fee->student_id], // Match by student ID
            [
                'student_name' => $fee->student_name,
                'course_id' => $fee->course_id, // Add course_id here
                'course_title' => $fee->course_title,
                'total_fees' => $fee->total_fees,
                'installments' => $fee->installments,
                'fees_paid' => $fee->fees_paid,
                'fees_due' => $fee->fees_due,
                'status' => $fee->status,
                'updated_at' => now(), // Update timestamp
            ]
        );
    }

    // Return the view with the fees data
    return view('dashboard.fees.fees', compact('feesData'));
}



    public function show($student_id)
    {

      
        // Fetch the student details along with fees and courses
        $student = Student::with(['fees.course'])->where('student_id', $student_id)->first();
    
        if (!$student) {
            return redirect()->route('fees.index')->with('error', 'Student not found.');
        }
    
        // Check if the student has any fees submitted
        $hasFees = $student->fees->isNotEmpty();
    
        // Pass the data to the view
        return view('dashboard.fees.single_fees', compact('student', 'hasFees'));
    }

    
    

    public function addStudentFees($student_id)
    {
        try {
            // Fetch the student fee status details using the student_id
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
    
            // Pass data to the view
            return view('dashboard.fees.add_fees', compact('studentFeesStatus', 'student', 'course'));
        } catch (\Exception $e) {
            return redirect()->route('fees.index')->with('error', 'Error: ' . $e->getMessage());
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

        // Create Fee entry
        $fee = new Fee();
        $fee->student_id = $student->student_id;
        $fee->course_id = $course->id; // Use course ID from the student's record
        $fee->amount_paid = $request->amount_paid;
        $fee->payment_date = $request->payment_date;
        $fee->due_date = $request->due_date;
        $fee->receipt_number = $request->receipt_number;
        $fee->receipt_image = $request->receipt_number . '.jpg'; // Default image name
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
        return redirect()->route('add_fees', ['student_id' => $student->student_id])
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


}

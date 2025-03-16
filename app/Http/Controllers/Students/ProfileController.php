<?php
namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Notifications\BatchChangeRequestNotification;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Course;
use App\Models\StudentVersion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


class ProfileController extends Controller
{
    public function profile()
    {
       
        // Get the logged-in user
    $user = Auth::user();

    // Fetch student details using student_id
    $student = Student::where('student_id', $user->student_id)->first();

    // If no student record found, handle error
    if (!$student) {
        return redirect()->back()->with('error', 'Student profile not found.');
    }

    // Get all unique batches
    $batches = Student::distinct()->pluck('batch');

    return view('students.profile.profile', compact('student', 'batches'));
    }


    public function requestBatchChange(Request $request, $studentId)
    {
        $request->validate([
            'batch' => 'required|string'
        ]);
    
        try {
            // Find the student
            $student = Student::where('student_id', $studentId)->first();
    
            if (!$student) {
                return redirect()->back()->with('error', 'Student not found.');
            }
    
            // Prepare old_data (only important fields)
            $oldData = [
                'name' => $student->name,
                'father_name' => $student->father_name,
                'student_id' => $student->student_id,
                'contact_number' => $student->contact_number,
                'doa' => $student->doa,
                'batch' => $student->batch,
                'course_name' => $student->course->course_name ?? 'N/A',
                'course_status' => $student->course_status,
            ];
    
            // Prepare new_data (only the batch field is updated)
            $newData = [
                'batch' => $request->batch, // Only update the batch field
            ];
    
            // Check if a StudentVersion record exists
            $studentVersion = StudentVersion::where('student_id', $studentId)
                ->where('status', 'pending')
                ->first();
    
            if ($studentVersion) {
                // Update the existing StudentVersion record
                $studentVersion->update([
                    'old_data' => json_encode($oldData), // Preserve old data (important fields only)
                    'new_data' => json_encode($newData), // Update batch only
                    'status' => 'pending',
                    'updated_by' => auth()->id() ?? 1, // Use authenticated user ID or default to 1
                ]);
            } else {
                // Create a new StudentVersion entry
                StudentVersion::create([
                    'student_id' => $studentId,
                    'old_data' => json_encode($oldData), // Store important fields only
                    'new_data' => json_encode($newData), // Store only batch update
                    'status' => 'pending',
                    'updated_by' => auth()->id() ?? 1, // Use authenticated user ID or default to 1
                ]);
            }
    
            // Notify Super Admin about the request
            $superAdmin = User::where('role', 'super_admin')->first();
            if ($superAdmin) {
                Notification::send($superAdmin, new BatchChangeRequestNotification($student, $request->batch));
            }
    
            // Redirect back with success message
            return redirect()->back()->with([
                'success' => 'Batch update requested successfully.',
                'approval_pending' => true, // Flag to show approval pending message
            ]);
        } catch (\Exception $e) {
            \Log::error("Batch Update Error: " . $e->getMessage());
            return redirect()->back()->with('error', 'Database error. Please try again.');
        }
    }
}



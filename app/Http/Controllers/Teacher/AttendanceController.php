<?php
namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\StudentVersion;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index(Request $request)
{
    // Get the batch from the request (if provided)
    $batch = $request->query('batch');

    // Fetch only students with status 'active' or 'completed'
    $studentsQuery = Student::where('course_status', 'ongoing');

    // Filter by batch if a batch is selected
    if ($batch) {
        $studentsQuery->where('batch', $batch);
    }

    // Get students
    $students = $studentsQuery->get();

    // Get all unique batches for filtering dropdown
    $batches = Student::where('course_status', 'ongoing')
        ->pluck('batch')
        ->unique();

    return view('teacher.attendance.index', compact('students', 'batches'));
}


    public function markAttendance(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'batch' => 'required|string',
            'status' => 'required|in:Present,Absent,Late',
        ]);

        Attendance::updateOrCreate(
            [
                'student_id' => $request->student_id,
                'attendance_date' => now()->toDateString(),
            ],
            [
                'user_id' => Auth::id(),
                'batch' => $request->batch,
                'status' => $request->status,
            ]
        );

        return redirect()->back()->with('success', 'Attendance marked successfully!');
    }



    public function updateBatch(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'batch' => 'required|string'
        ]);
    
        try {
            // Find the student
            $student = Student::where('student_id', $request->student_id)->first();
    
            if (!$student) {
                return response()->json(['error' => 'Student not found'], 404);
            }
    
            // Preserve existing data and only update batch
            $oldData = [
                'name' => $student->name,
                'father_name' => $student->father_name,
                'doa' => $student->doa,
                'course_id' => $student->course_id,
                'batch' => $student->batch, // Old batch value
                'contact_number' => $student->contact_number,
                'photo' => $student->photo,
            ];
    
            $newData = ['batch' => $request->batch]; // Only update batch
    
            // Check if a StudentVersion record exists
            $studentVersion = StudentVersion::where('student_id', $request->student_id)->first();
    
            if ($studentVersion) {
                // Get existing new_data and merge only batch update
                $existingNewData = json_decode($studentVersion->new_data, true);
                $mergedNewData = array_merge($existingNewData ?? [], $newData);
    
                // Update the existing record
                $studentVersion->update([
                    'old_data' => json_encode($oldData), // Preserve old data
                    'new_data' => json_encode($mergedNewData), // Update batch only
                    'status' => 'pending',
                    'updated_by' => auth()->id() ?? 1,
                ]);
            } else {
                // Create a new StudentVersion entry
                StudentVersion::create([
                    'student_id' => $request->student_id,
                    'old_data' => json_encode($oldData),
                    'new_data' => json_encode($newData), // Store only batch update
                    'status' => 'pending',
                    'updated_by' => auth()->id() ?? 1,
                ]);
            }
    
            return response()->json(['success' => 'Batch update requested']);
        } catch (\Exception $e) {
            \Log::error("Batch Update Error: " . $e->getMessage());
            return response()->json(['error' => 'Database error'], 500);
        }
    }
    
    
    
    
}

<?php
namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index(Request $request)
{
    // Get the batch from the request (if provided)
    $batch = $request->query('batch');

    // Fetch only students with status 'active' or 'completed'
    $studentsQuery = Student::whereIn('status', ['active', 'completed']);

    // Filter by batch if a batch is selected
    if ($batch) {
        $studentsQuery->where('batch', $batch);
    }

    // Get students
    $students = $studentsQuery->get();

    // Get all unique batches for filtering dropdown
    $batches = Student::whereIn('status', ['active', 'completed'])
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
}

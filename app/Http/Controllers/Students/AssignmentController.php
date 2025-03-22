<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Student;
use App\Models\user;
use Illuminate\Support\Facades\DB; // ✅ Add this line

use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    // Show assignments assigned to the logged-in student
    public function index()
    {
        $userId = Auth::id(); // Get logged-in user ID (e.g., 71)
    
        // Fetch student_id from users table
        $student = DB::table('users')->where('id', $userId)->first();
    
        if (!$student) {
            return back()->with('error', 'User not found.');
        }
    
        $studentId = $student->student_id; // Now we have the student_id
    
        // Fetch assignments assigned to this student_id
        $assignments = Assignment::join('assignment_student', 'assignments.id', '=', 'assignment_student.assignment_id')
            ->where('assignment_student.student_id', $studentId)
            ->select('assignments.*') // Select only assignment columns
            ->get();
    
        
    
        return view('students.assignments.index', compact('assignments'));
    }

    // Show assignment details & allow answering
    public function show($id)
    {
        $assignment = Assignment::with('course')->findOrFail($id);

        // Decode JSON questions
        $questions = json_decode($assignment->questions, true);

        return view('students.assignments.show', compact('assignment', 'questions'));
    }

    // Submit assignment answers
    public function submit(Request $request, $id)
{
    $assignment = Assignment::findOrFail($id);
   $userId = Auth::id(); // Get logged-in user ID (e.g., 71)
    
        // Fetch student_id from users table
        $student = DB::table('users')->where('id', $userId)->first();
    
        if (!$student) {
            return back()->with('error', 'User not found.');
        }
    
        $studentId = $student->student_id; // Now we have the student_id
    // Validate answers
    $validatedData = $request->validate([
        'answers' => 'required|array',
        'answers.*' => 'string|min:2',
    ]);

    // Check if student is already assigned
    if ($assignment->students()->wherePivot('student_id', $studentId)->exists()) {
        // Update answers
        $assignment->students()->updateExistingPivot($studentId, ['answers' => json_encode($validatedData['answers'])]);
    } else {
        // Attach if entry doesn't exist
        $assignment->students()->attach($studentId, ['answers' => json_encode($validatedData['answers'])]);
    }

    return redirect()->route('student.assignments.index')->with('success', 'Assignment submitted successfully.');
}


}

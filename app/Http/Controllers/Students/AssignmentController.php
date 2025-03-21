<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Student;
use App\Models\user;

use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    // View Assignments for Students
    public function index()
    {
        $studentId = Auth::user()->student_id; // Get student_id from users table
        $assignments = Assignment::where('student_id', $studentId)->get(); // Fetch assignments for this student
    
        return view('students.assignments.index', compact('assignments'));
    }

    // Submit Assignment Form
    public function create($id)
    {
        $assignment = Assignment::findOrFail($id);
        return view('students.assignments.submit', compact('assignment'));
    }

    // Store Submitted Assignment
    public function store(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $assignment = Assignment::findOrFail($id);
        $filePath = $request->file('file')->store('assignments');

        // Save submitted assignment with student_id
        $submittedAssignment = new Assignment();
        $submittedAssignment->title = $assignment->title;
        $submittedAssignment->description = $assignment->description;
        $submittedAssignment->deadline = $assignment->deadline;
        $submittedAssignment->file_name = $filePath;
        $submittedAssignment->student_id = Auth::id();
        $submittedAssignment->added_by = $assignment->added_by;
        $submittedAssignment->save();

        return redirect()->route('student.assignments.index')->with('success', 'Assignment submitted successfully!');
    }
}

<?php

namespace App\Http\Controllers\Teacher;

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
    
    // Show Create Form
public function create()
{
    $courses = Course::all(); 
    $students = Student::all(); // Get all students initially

    return view('teacher.assignments.add', compact('courses', 'students'));
}

// Store New Assignment
public function store1(Request $request) {
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'course_id' => 'required|exists:courses,id',
        'student_id' => 'required|array', // Ensure it's an array
        'student_id.*' => 'exists:students,student_id', // Validate each student ID
        'questions' => 'required|array',
        'questions.*' => 'string|min:5',
        'deadline' => 'required|date|after:today',
        'status' => 'required|in:active,inactive',
    ]);

    // Check if user is authenticated
    if (!auth()->check()) {
        return back()->with('error', 'User is not authenticated.');
    }

    // Convert questions array to JSON
    $validatedData['questions'] = json_encode($validatedData['questions']);

    // Create the assignment first (without student_id)
    $assignment = Assignment::create([
        'title'       => $validatedData['title'],
       
        'description' => $validatedData['description'],
        'course_id'   => $validatedData['course_id'],
        'questions'   => $validatedData['questions'],
        'deadline'    => $validatedData['deadline'],
        'status'      => $validatedData['status'],
        'added_by'    => auth()->id(),
    ]);

    // Attach students to the pivot table
    $assignment->students()->attach($validatedData['student_id']);

    return redirect()->route('teacher.assignments.index')->with('success', 'Assignment created successfully.');
}


    // Update Assignment
    public function index()
    {
        $assignments = Assignment::with(['course', 'addedBy', 'students'])->get();
        return view('teacher.assignments.index', compact('assignments'));
    }
    

    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
        $courses = Course::all();
        $students = Student::all();
    
        // Fetch assigned students for this assignment
        $assigned_students = DB::table('assignment_student')
                                ->where('assignment_id', $id)
                                ->pluck('student_id')
                                ->toArray();
    
        return view('teacher.assignments.edit', compact('assignment', 'courses', 'students', 'assigned_students'));
    }
    public function update(Request $request, $id)
{
    $assignment = Assignment::findOrFail($id);

    // Validate request data
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'deadline' => 'required|date',
        'questions' => 'required|array', // Match insertion
        'questions.*' => 'string|min:5',
        'course_id' => 'required|integer|exists:courses,id',
        'status' => 'required|in:active,inactive',
        'student_id' => 'required|array', // Match insertion
        'student_id.*' => 'exists:students,student_id', // Validate student IDs
    ]);

    // Convert questions to JSON (same as insertion)
    $validatedData['questions'] = json_encode($validatedData['questions']);

    // Update assignment
    $assignment->update([
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'deadline' => $validatedData['deadline'],
        'questions' => $validatedData['questions'],
        'course_id' => $validatedData['course_id'],
        'status' => $validatedData['status'],
        'added_by' => $assignment->added_by ?? auth()->id(), 
        'updated_by' => auth()->id(),
    ]);

    // **Fix**: Use `student_id` instead of `student_ids`
    $assignment->students()->sync($validatedData['student_id']);

    return redirect()->back()->with('success', 'Assignment updated successfully!');
}


    public function viewSubmissions($assignmentId)
    {
     
        $assignment = Assignment::with(['students' => function ($query) {
            $query->select('students.student_id', 'students.name', 'assignment_student.answers');
        }])->findOrFail($assignmentId);

        return view('teacher.assignments.submission', compact('assignment'));
    }
         
}

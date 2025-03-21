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
    
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'questions' => 'nullable|array',
            'course_id' => 'required|integer|exists:courses,id',
            'status' => 'required|in:active,inactive',
            'updated_by' => 'nullable|integer|exists:users,id',
            'student_ids' => 'nullable|array|exists:students,id' // Ensure student_ids exist in the students table
        ]);
    
        // Ensure questions are stored as JSON
        $questions = json_encode($request->questions);
    
        // Update assignment fields
        $assignment->update([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'questions' => $questions,
            'course_id' => $request->course_id,
            'status' => $request->status,
            'added_by' => $assignment->added_by ?? auth()->id(), // Keep existing or set to current user
            'updated_by' => auth()->id() // Automatically set to the current user
        ]);
    
        // ✅ Store student IDs in `assignment_student` pivot table
        if ($request->has('student_ids')) {
            $assignment->students()->sync($request->student_ids);
        }
    
        return redirect()->back()->with('success', 'Assignment updated successfully!');
    }
            
}

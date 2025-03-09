<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    // Show All Assignments
    public function index()
    {
        $assignments = Assignment::where('added_by', Auth::id())->get();
        return view('teacher.assignments.index', compact('assignments'));
    }

    // Show Create Form
    public function create()
    {
        $courses = Course::all();
        $students = User::where('role', 'student')->get(); // Fetch students from the users table
    
        return view('teacher.assignments.add', compact('courses', 'students'));
    }
    

    // Store New Assignment
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'course_id' => 'required|exists:courses,id',
        'student_id' => 'required|exists:students,student_id', // Validate student_id
        'file' => 'nullable|mimes:pdf,doc,docx,zip|max:2048',
        'due_date' => 'required|date',
        'status' => 'required|in:active,inactive',
    ]);

    $fileName = null;
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('assignments', $fileName, 'public'); // Store file in 'storage/app/public/assignments'
    }

    Assignment::create([
        'title' => $request->title,
        'description' => $request->description,
        'course_id' => $request->course_id,
        'student_id' => $request->student_id,
        'file_name' => $fileName,
        'due_date' => $request->due_date,
        'status' => $request->status,
        'added_by' => auth()->id(),
        'updated_by' => auth()->id(),
    ]);

    return redirect()->route('teacher.assignments.index')->with('success', 'Assignment created successfully.');
}

    // Show Edit Form
    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
        $courses = Course::all();
        return view('teacher.assignments.edit', compact('assignment', 'courses'));
    }

    // Update Assignment
    public function update(Request $request, $id)
    {
        $assignment = Assignment::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'course_id'   => 'required|integer',
            'due_date'    => 'required|date',
            'file'        => 'nullable|mimes:pdf,doc,docx|max:2048',
            'status'      => 'required|in:active,inactive',
        ]);

        // Handle File Upload
    if ($request->hasFile('file')) {
        if ($assignment->file_name) {
            Storage::disk('public')->delete('assignments/' . $assignment->file_name); // Delete old file
        }
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('assignments', $fileName, 'public');
        $assignment->file_path = $fileName;
    }

        $assignment->update([
            'title'       => $request->title,
            'description' => $request->description,
            'course_id'   => $request->course_id,
            'due_date'    => $request->due_date,
            'status'      => $request->status,
            'updated_by'  => Auth::id(),
        ]);

        return redirect()->route('teacher.assignments.index')->with('success', 'Assignment updated successfully.');
    }

    // Delete Assignment
    public function destroy($id)
    {
        $assignment = Assignment::findOrFail($id);
        $assignment->delete();

        return redirect()->route('teacher.assignments.index')->with('success', 'Assignment deleted successfully.');
    }
}

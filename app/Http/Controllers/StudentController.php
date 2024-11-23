<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    // Show the Add Student Form
    public function create()
    {
        $courses = Course::all();
        return view('dashboard.add_student'); // Ensure the Blade file is named add_student.blade.php
    }

    // Handle Form Submission
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:students,student_id',
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'doa' => 'required|date',
            'course' => 'required|exists:courses,id', // Ensure the selected course exists in the database
            'batch' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

      // Handle photo upload if provided
$photoPath = null;
if ($request->hasFile('photo')) {
    // Store photo in the 'public/students' directory within the 'public' disk
    $photoPath = $request->file('photo')->storeAs('students', $request->file('photo')->getClientOriginalName(), 'public');
}


        // Save student data
        Student::create([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'father_name' => $request->father_name,
            'doa' => $request->doa,
            'course_id' => $request->course, // Use course_id instead of course
            'batch' => $request->batch,
            'photo' => $photoPath,
        ]);

        // Redirect with success message
        return redirect()->route('students.create')->with('success', 'Student added successfully!');
    }

    
// Display Paginated Students
public function index()
{
     // Fetch all students with their related courses
    $students = Student::with('course')->paginate(10); // Eager load 'course' relationship

    // Pass the students to the view
    return view('dashboard.display_students', compact('students'));
}

public function edit($id)
{
    $student = Student::findOrFail($id); // Find the student by ID
    return view('dashboard.edit_student', compact('student')); // Return the edit view
}

public function update(Request $request, $id)
{
    $student = Student::findOrFail($id); // Find the student by ID
    $student->update($request->all()); // Update student with the provided data
}


public function destroy($id)
{
    $student = Student::findOrFail($id); // Find the student by ID
    $student->delete(); // Delete the student record
}
}

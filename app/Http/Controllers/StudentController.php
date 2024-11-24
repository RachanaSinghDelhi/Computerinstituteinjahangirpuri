<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use PDF;
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

// Show the form for editing the specified student.
public function edit($id)
{
    // Find the student by their ID
    $student = Student::findOrFail($id);

    // Get all courses to populate the dropdown
    $courses = Course::all();


   
    // Return the 'edit' view with the student and courses data
    return view('dashboard.edit_student', compact('student', 'courses'));
}

// Update the specified student in storage.
public function update(Request $request, $id)
{
    // Validate the incoming data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'father_name' => 'required|string|max:255',
        'doa' => 'required|date',
        'course_id' => 'nullable|exists:courses,id',
        'batch' => 'required|string|max:255',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Find the student by ID
    $student = Student::findOrFail($id);

    // Update student information
    $student->name = $validatedData['name'];
    $student->father_name = $validatedData['father_name'];
    $student->doa = $validatedData['doa'];
    $student->course_id = $validatedData['course_id'];
    $student->batch = $validatedData['batch'];

    // Handle file upload if a photo is provided
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->storeAs('students', $request->file('photo')->getClientOriginalName(), 'public');
        $student->photo = $photoPath;
    }

    // Save the student data to the database
    $student->save();

    // Redirect to a success page or back to the student list with a success message
    return redirect()->route('students.index')->with('success', 'Student updated successfully.');
}



public function destroy($id)
{
    $student = Student::findOrFail($id); // Find the student by ID
    $student->delete(); // Delete the student record
    return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
}


 public function showIdCards()
    {
        // Fetch all students
        $students = Student::all();
        
        // Return the view with the students data
        return view('dashboard.id-cards', compact('students'));
    }

  

    public function downloadIdCard($id)
    {
        // Fetch the student data
        $student = Student::findOrFail($id);
        
        // Generate the ID card PDF
        $pdf = PDF::loadView('dashboard.id-card-pdf',compact('student'));
    
        // Download the generated PDF
        return $pdf->download($student->student_id . '-id-card.pdf');
    }
    
}
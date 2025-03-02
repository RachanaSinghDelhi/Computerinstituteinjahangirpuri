<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use PDF;
use Illuminate\Support\Facades\Storage;
use App\Imports\StudentsImport;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
class StudentController extends Controller
{
    // Show the Add Student Form
    public function create()
    {
        $courses = Course::all();
        return view('teacher.students.add_student'); // Ensure the Blade file is named add_student.blade.php
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:students,student_id',
            'name' => 'required|string|max:255',
            'course' => 'required|exists:courses,id',
        ]);
    
        // Handle optional fields
        $fatherName = $request->father_name ?? null;
        $doa = $request->doa ?? null;
        $batch = $request->batch ?? null;
        $contactNumber = $request->contact_number ?? null;
    
        // Handle image upload
        if ($request->filled('cropped_photo')) {
            // Decode base64 image
            $croppedImage = $request->input('cropped_photo');
            $imageData = substr($croppedImage, strpos($croppedImage, ',') + 1);
            $imageData = base64_decode($imageData);
    
            // Define the filename and path
            $fileName = $request->student_id . '.jpg';
            $filePath = 'students/' . $fileName;
    
            // Store the image in storage/students/
            Storage::disk('public')->put($filePath, $imageData);
        } else {
            // Use default image if no image is uploaded
            $fileName = 'default_image.jpg';
            $filePath = 'assets/' . $fileName;
        }
    
            // Get the logged-in user's username or use 'super_admin' if not logged in
    $addedBy = auth()->check() ? auth()->user()->name : 'super_admin';

        // Save student data
        Student::create([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'father_name' => $fatherName,
            'doa' => $doa,
            'course_id' => $request->course,
            'batch' => $batch,
            'photo' => $fileName, // Ensure photo is saved
            'contact_number' => $contactNumber,
            'added_by' => $addedBy, // Save the authenticated user's name
        ]);
    
        return redirect()->route('teacher.students.index')->with('success', 'Student added successfully.');
    }
    
    
// Display Paginated Students
public function index()
{
     // Fetch all students with their related courses
     $students = Student::with('course')
     ->orderBy('student_id', 'desc') // Order by `id` in descending order
     ->where('status','active')
     ->get(); // Fetch all records instead of paginating
    $courses = Course::all();
    // Pass the students to the view
    return view('teacher.students.index', compact('students','courses'));
}

// Show the form for editing the specified student.
public function edit($id)
{
    // Find the student by their ID
    $student = Student::findOrFail($id);

    // Get all courses to populate the dropdown
    $courses = Course::all();


   
    // Return the 'edit' view with the student and courses data
    return view('teacher.students.edit_student', compact('student', 'courses'));
}

public function update(Request $request, $id)
{
    // Validate the incoming data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'father_name' => 'required|string|max:255',
        'doa' => 'required|date',
        'course_id' => 'nullable|exists:courses,id',
        'batch' => 'required|string|max:255',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validate uploaded image
        'cropped_photo' => 'nullable|string', // Validate cropped image Base64 string
        'contact_number' => 'required|string|max:15', // Validate contact number
       
    ]);

    // Find the student by ID
    $student = Student::findOrFail($id);


    // Get the logged-in user
    $user = auth()->user();

    // Ensure only teachers have the edit limit restriction
    if ($user->role === 'teacher') {
        if ($student->edit_count >= 2) {
            return redirect()->back()->with('error', 'You can only edit this student twice.');
        }
    }
    // Get the logged-in user or default to 'super_admin'
    $updatedBy = auth()->check() ? auth()->user()->name : 'super_admin';
    // Update student information
    $student->name = $validatedData['name'];
    $student->father_name = $validatedData['father_name'];
    $student->doa = $validatedData['doa'];
    $student->course_id = $validatedData['course_id'];
    $student->batch = $validatedData['batch'];
    $student->contact_number = $validatedData['contact_number'];
    $student->added_by = $updatedBy; // Track who updated the student
    // Handle cropped image if provided
    if ($request->filled('cropped_photo')) {
        $croppedImage = $request->input('cropped_photo'); // Get Base64 string
        $imageData = explode(',', $croppedImage)[1]; // Extract the Base64 data
        $decodedImage = base64_decode($imageData); // Decode the Base64 string

        // Generate a unique file name for the cropped image
        $fileName = $id.'.jpg';

        // Define the storage path
        $path = 'storage/students/' . $fileName;

        // Save the cropped image to storage
        file_put_contents(public_path($path), $decodedImage);

        // Update the student's photo field with the path to the cropped image
        $student->photo = $fileName;
    } elseif ($request->hasFile('photo')) {
        // Handle the uploaded file if no cropped image is provided
        $fileName = $request->file('photo')->getClientOriginalName();
        $photoPath = $request->file('photo')->storeAs('students', $fileName, 'public');
        $student->photo = $fileName;
    }

    // Increment the edit count for the student
    // Increment edit count only if the user is a teacher
    if ($user->role === 'teacher') {
        $student->edit_count += 1;
    }
    // Save the updated student data to the database
    $student->save();

    // Redirect to a success page or back to the student list with a success message
    return redirect()->route('teacher.students.index')->with('success', 'Student updated successfully.');
}







 
// app/Http/Controllers/StudentController.php
public function search(Request $request)
{
    $query = $request->input('query');

    $students = Student::select('id', 'student_id', 'name', 'father_name', 'doa', 'course_id', 'batch', 'photo', 'status')
        ->where('name', 'LIKE', "%{$query}%")
        ->orWhere('student_id', 'LIKE', "%{$query}%")
        ->paginate(10);

    return view('teacher.students.student_search', compact('students'))->render();
  
}


 
}
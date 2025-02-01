<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage; // Correct placement
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use PDF;
use App\Imports\StudentsImport;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{


    // Display Paginated Students
public function index()
{
     // Fetch all students with their related courses
     $students = Student::with('course')
     ->orderBy('student_id', 'desc') // Order by `id` in descending order
     ->paginate(50);// Eager load 'course' relationship
    $courses = Course::all();
    // Pass the students to the view
    return view('admin.students.index', compact('students','courses'));
}

    /**
     * Display the add_students form.
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.students.add_student');
    }



public function store(Request $request)
{
    $request->validate([
        'student_id' => 'required|unique:students,student_id',
        'name' => 'required|string|max:255',
        'father_name' => 'required|string|max:255',
        'doa' => 'required|date',
        'course' => 'required|exists:courses,id',
        'batch' => 'required|string',
        'contact_number' => 'required|numeric|regex:/^[0-9]{10}$/',
      'cropped_photo' => 'required',
    ]);


 // Decode base64 image
 $croppedImage = $request->input('cropped_photo');
 $imageData = substr($croppedImage, strpos($croppedImage, ',') + 1);
 $imageData = base64_decode($imageData);

 // Define the filename and path
 $fileName = $request->student_id . '.jpg';
 $filePath = 'students/' . $fileName;

 // Store the image in storage/students/
 Storage::disk('public')->put($filePath, $imageData);
  
    // Save student data
    Student::create([
        'student_id' => $request->student_id,
        'name' => $request->name,
        'father_name' => $request->father_name,
        'doa' => $request->doa,
        'course_id' => $request->course,
        'batch' => $request->batch,
        'photo' => $fileName, // Ensure photo is saved
        'contact_number' => $request->contact_number,
    ]);

    return redirect()->route('admin.students.index')->with('success', 'Student added successfully.');
}


    // Show the form for editing the specified student.
public function edit($id)
{
    // Find the student by their ID
    $student = Student::findOrFail($id);

    // Get all courses to populate the dropdown
    $courses = Course::all();


   
    // Return the 'edit' view with the student and courses data
    return view('admin.students.edit_student', compact('student', 'courses'));
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

    // Update student information
    $student->name = $validatedData['name'];
    $student->father_name = $validatedData['father_name'];
    $student->doa = $validatedData['doa'];
    $student->course_id = $validatedData['course_id'];
    $student->batch = $validatedData['batch'];
    $student->contact_number = $validatedData['contact_number'];

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

    // Save the updated student data to the database
    $student->save();

    // Redirect to a success page or back to the student list with a success message
    return redirect()->route('admin.students.index')->with('success', 'Student updated successfully.');
}




    }

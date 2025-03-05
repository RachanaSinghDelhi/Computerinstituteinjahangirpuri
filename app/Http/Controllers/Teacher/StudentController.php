<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use PDF;
use Illuminate\Support\Facades\Storage;
use App\Models\StudentVersion;
use Illuminate\Support\Facades\Auth;
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
            'student_id'     => 'required|string|max:50|unique:students,student_id',
            'name'           => 'required|string|max:255',
            'father_name'    => 'required|string|max:255',
            'doa'            => 'required|date',
            'course'         => 'required|exists:courses,id',
            'batch'          => 'required|string|max:100',
            'contact_number' => 'required|string|regex:/^[0-9]{10}$/', // 10-digit mobile number validation
            'cropped_photo'  => 'required|string', // Required base64 image
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
        StudentVersion::create([
            'student_id' => $request->student_id,
            'old_data' => json_encode([]),
            'new_data' => json_encode([
                'student_id' => $request->student_id,
                'name' => $request->name,
                'father_name' => $request->father_name ,
                'doa' => $request->doa,
                'course_id' => $request->course,
                'batch' => $request->batch ?? null,
                'contact_number' => $request->contact_number,
                'photo' => $fileName,
              'updated_by' => Auth::check() ? Auth::user()->id : 1, // Assuming 1 is super_admin's ID
            ]),
            'status' => 'pending', // Waiting for approval
          'updated_by' => Auth::check() ? Auth::user()->id : 1, // Assuming 1 is super_admin's ID
        ]);
    
    
        return redirect()->route('teacher.students.index')->with('success', 'Student added successfully.Approval Pending');
    }
    
    
// Display Paginated Students
public function index()
{
    $teacherId = auth()->id();

    // Fetch all courses and store them in an associative array [id => course_name]
    $courses = Course::pluck('course_name', 'id')->toArray();

    // Fetch students added by the teacher
    $students = StudentVersion::where('updated_by', $teacherId)->get();

    // Decode new_data and attach the correct course name
    foreach ($students as $student) {
        $student->new_data = json_decode($student->new_data, true); // Decode JSON
        $courseId = $student->new_data['course_id'] ?? null; // Extract course_id from JSON

        // Attach course name if course_id exists
        $student->course_name = $courses[$courseId] ?? 'N/A';
    }

    return view('teacher.students.index', compact('students'));
}


// Show the form for editing the specified student.
public function edit($id) 
{
    // Find the latest student version record
    $studentVersion = StudentVersion::where('student_id', $id)->latest()->first();

    // Check if student data exists in student_version table
    if (!$studentVersion) {
        return redirect()->back()->with('error', 'Student record not found.');
    }

    // Check if the student's status is pending
    if ($studentVersion->status !== 'approved') {
        return redirect()->back()->with('error', 'Approval pending for student data.');
    }

    // Find the student from the main students table
    $student = Student::findOrFail($id);

    // Get all courses to populate the dropdown
    $courses = Course::all();

    // Return the edit view
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
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'cropped_photo' => 'nullable|string',
        'contact_number' => 'required|string|max:15',
    ]);

    // Find the student by ID
    $student = Student::findOrFail($id);
    
    // Get the logged-in user
    $user = auth()->user();

    // Ensure only teachers have the edit limit restriction
    if ($user->role === 'teacher' && $student->edit_count >= 2) {
        return redirect()->back()->with('error', 'You can only edit this student twice.');
    }

    // Get the logged-in user ID or default to 1
    $updatedBy = auth()->check() ? auth()->user()->id : 1;

    // Get old data before changes
    $oldData = [
        'name' => $student->name,
        'father_name' => $student->father_name,
        'doa' => $student->doa,
        'course_id' => $student->course_id,
        'batch' => $student->batch,
        'contact_number' => $student->contact_number,
        'photo' => $student->photo, // Preserve the old photo
    ];

    // Prepare new data with changes
    $newData = [
        'student_id' => $id, // Ensure student_id is included
        'name' => $validatedData['name'],
        'father_name' => $validatedData['father_name'],
        'doa' => $validatedData['doa'],
        'course_id' => $validatedData['course_id'],
        'batch' => $validatedData['batch'],
        'contact_number' => $validatedData['contact_number'],
        'photo' => $oldData['photo'], // Preserve the existing photo if not updated
    ];

    // Handle cropped image if provided
    if ($request->filled('cropped_photo')) {
        $croppedImage = base64_decode(explode(',', $request->cropped_photo)[1]);
        $fileName = $id . '.jpg';
        Storage::disk('public')->put('students/' . $fileName, $croppedImage);
        $newData['photo'] = $fileName;
    } elseif ($request->hasFile('photo')) {
        $fileName = $request->file('photo')->getClientOriginalName();
        $photoPath = $request->file('photo')->storeAs('students', $fileName, 'public');
        $newData['photo'] = $fileName;
    }

    // Check if a StudentVersion record already exists
    $studentVersion = StudentVersion::where('student_id', $id)->first();

    if ($studentVersion) {
        // Merge old new_data with new changes
        $existingNewData = json_decode($studentVersion->new_data, true);
        $mergedNewData = array_merge($existingNewData ?? [], $newData);

        // Update the existing record
        $studentVersion->update([
            'old_data' => json_encode($oldData),
            'new_data' => json_encode($mergedNewData),
            'status' => 'pending', // Requires admin approval
            'updated_by' => $updatedBy,
        ]);
    } else {
        // Create a new record
        StudentVersion::create([
            'student_id' => $id,
            'old_data' => json_encode($oldData),
            'new_data' => json_encode($newData),
            'status' => 'pending',
            'updated_by' => $updatedBy,
        ]);
    }

    return redirect()->route('teacher.students.index')->with('success', 'Update request submitted for approval.');
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
<?php

namespace App\Http\Controllers;

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
        return view('dashboard.students.add_student'); // Ensure the Blade file is named add_student.blade.php
    }

    public function liststore(Request $request)
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
        ]);
    
        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }
    
    
// Display Paginated Students
public function index()
{
     // Fetch all students with their related courses
     $students = Student::with('course')
     ->orderBy('student_id', 'desc') // Order by `id` in descending order
     ->paginate(5);// Eager load 'course' relationship
    $courses = Course::all();
    // Pass the students to the view
    return view('dashboard.students.display_students', compact('students','courses'));
}

// Show the form for editing the specified student.
public function edit($id)
{
    // Find the student by their ID
    $student = Student::findOrFail($id);

    // Get all courses to populate the dropdown
    $courses = Course::all();


   
    // Return the 'edit' view with the student and courses data
    return view('dashboard.students.edit_student', compact('student', 'courses'));
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
    return redirect()->route('students.index')->with('success', 'Student updated successfully.');
}







 public function showIdCards()
    {
        // Fetch all students
        $students = Student::with('course')->orderBy('id', 'desc')->paginate(50);
        
        // Return the view with the students data
        return view('dashboard.id-cards.id-cards', compact('students'));
    }

  


    public function downloadIdCard($id)
    {
        // Fetch the student data using the student_id column
        $student = Student::with('course')->where('student_id', $id)->firstOrFail();
    
        // Load the Blade template into a PDF
        $pdf = PDF::loadView('dashboard.id-cards.student-id-card', compact('student'));
    

        $pdf->setPaper([0, 0, 162, 256], 'portrait');
        // Return the PDF for download with a descriptive filename
        return $pdf->download('Student_ID_' . $student->student_id . '.pdf');

    }
    

public function downloadSelectedIdCards(Request $request)
{
    // Validate that at least one ID is selected
    $request->validate([
        'selected_ids' => 'required|array|min:1', // Ensure at least one ID is selected
        'selected_ids.*' => 'exists:students,student_id', // Ensure each selected ID exists in the database
           ]);

    // Check if selected_ids is not empty
    if (empty($request->selected_ids)) {
        return back()->withErrors(['selected_ids' => 'Please select at least one ID card to download.']);
    }

    // Fetch the selected students and their details
    $students = Student::with('course')
        ->whereIn('student_id', $request->selected_ids)
        ->get();

    // Check if any students were found
    if ($students->isEmpty()) {
        return back()->withErrors(['selected_ids' => 'No students found for the selected IDs.']);
    }

    // Load the Blade view and pass the student data
    $pdf = PDF::loadView('dashboard.id-cards.selected-id-cards', compact('students'));


    $pdf->setPaper([0, 0, 158, 252], 'portrait');
    // Return the PDF for download
    $filename = 'student_id_' . now()->format('d-F-Y') . '.pdf';
 
    return $pdf->download($filename);
}

public function import(Request $request)
{
    // Validate the uploaded file
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv'
    ]);
   
    // Log the file name being uploaded for debugging
    \Log::info('File uploaded: ' . $request->file('file')->getClientOriginalName());

    try {
        // Import the Excel file
        Excel::import(new StudentsImport, $request->file('file'));
     
        // Log the number of records in the database after import
        $studentCount = \App\Models\Student::count();
        \Log::info('Number of students in the database after import: ' . $studentCount);

        return redirect()->route('students.index')->with('success', 'Students Imported Successfully!');
    } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        // Specific validation exception from Maatwebsite\Excel
        $failures = $e->failures();
        foreach ($failures as $failure) {
            \Log::error("Row {$failure->row()} failed: " . json_encode($failure->values()));
        }
        return back()->with('error', 'Some rows failed validation. Check logs for details.');
    } catch (\Illuminate\Database\QueryException $e) {
        // Database query exception
        \Log::error('Database error: ' . $e->getMessage());
        return back()->with('error', 'Database error occurred during import: ' . $e->getMessage());
    } catch (\Exception $e) {
        // General exception
        \Log::error('Import failed: ' . $e->getMessage());
        return back()->with('error', 'An error occurred during the import: ' . $e->getMessage());
    }
}



public function updateStatus(Request $request)
{
    $student = Student::find($request->id);
    if (!$student) {
        return response()->json(['message' => 'Student not found'], 404);
    }
    $student->status = $request->status;
    $student->save();

    return response()->json(['message' => 'Status updated successfully']);
}

public function destroy(Request $request)
{
    $student = Student::find($request->id);
    if (!$student) {
        return response()->json(['message' => 'Student not found'], 404);
    }
    $student->delete();

    return response()->json(['message' => 'Student deleted successfully']);
}

public function deleteMultiple(Request $request)
{
    Student::whereIn('id', $request->ids)->delete();

    return response()->json(['message' => 'Selected students deleted successfully']);
}


public function bulkUpdateStatus(Request $request)
{
    $validated = $request->validate([
        'ids' => 'required|array',
        'status' => 'required|string',
    ]);

    Student::whereIn('id', $validated['ids'])->update(['status' => $validated['status']]);

    return response()->json(['message' => 'Status updated successfully for selected students']);
}


// app/Http/Controllers/StudentController.php
public function search(Request $request)
{
    $query = $request->input('query');

    $students = Student::select('id', 'student_id', 'name', 'father_name', 'doa', 'course_id', 'batch', 'photo', 'status')
        ->where('name', 'LIKE', "%{$query}%")
        ->orWhere('student_id', 'LIKE', "%{$query}%")
        ->paginate(10);

    return view('dashboard.students.student_search', compact('students'))->render();
  
}


 // Export Excel
 public function exportExcel(Request $request)
{
    // Fetch students and export them to Excel
   

    // Return the Excel file as a response
    return Excel::download(new StudentsExport, 'students.xlsx');
}

 public function exportSQL()
    {
        $students = Student::all([
            'student_id', 'name', 'father_name', 'doa', 'batch', 
            'photo', 'created_at', 'updated_at', 'course_id', 'contact_number', 'status'
        ]);

        $sql = "INSERT INTO students (student_id, name, father_name, doa, batch, photo, created_at, updated_at, course_id, contact_number, status) VALUES\n";
        
        foreach ($students as $student) {
            $sql .= "('{$student->student_id}', '{$student->name}', '{$student->father_name}', '{$student->doa}', '{$student->batch}', 
                    '{$student->photo}', '{$student->created_at}', '{$student->updated_at}', '{$student->course_id}', 
                    '{$student->contact_number}', '{$student->status}'),\n";
        }

        // Remove the last comma and append semicolon
        $sql = rtrim($sql, ",\n") . ";";

        return response($sql, 200)
            ->header('Content-Type', 'application/sql')
            ->header('Content-Disposition', 'attachment; filename="students.sql"');
    }

}
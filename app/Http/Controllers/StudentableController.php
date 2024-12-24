<?php
namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentableController extends Controller
{
    public function index()
    {
         // Fetch all students with their related courses
         $students = Student::with('course')
         ->orderBy('id', 'desc')  // Order by the id column in descending order
         ->paginate(5);
        $courses = Course::all();
        // Pass the students to the view
        return view('dashboard.student_table', compact('students','courses'));
    }

   // Store a new student
   public function store(Request $request)
{
    try {
        // Validate the input
        $validatedData = $request->validate([
            'student_id' => 'required|unique:students',
            'name' => 'required|string',
            'father_name' => 'required|string',
            'doa' => 'required|date',
            'batch' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'contact_number' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Photo validation
        ]);

        // Handle file upload (if any)
        $photoPath = null;
        if ($request->hasFile('photo')) {
            // Get the original file name
            $fileName = $request->file('photo')->getClientOriginalName();

            // Store the file using the original file name
            $photoPath = $request->file('photo')->storeAs('students', $fileName, 'public');
        }

        // Create the student entry
        $student = new Student();
        $student->student_id = $validatedData['student_id'];
        $student->name = $validatedData['name'];
        $student->father_name = $validatedData['father_name'];
        $student->doa = $validatedData['doa'];
        $student->batch = $validatedData['batch'];
        $student->course_id = $validatedData['course_id'];
        $student->contact_number = $validatedData['contact_number'];
        $student->photo =   $fileName;
        $student->save();

        return response()->json([
            'success' => true,
            'message' => 'Student added successfully!',
        ]);

    } catch (\Illuminate\Validation\ValidationException $ex) {
        return response()->json([
            'success' => false,
            'message' => 'Validation error.',
            'errors' => $ex->errors(),
        ], 422);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred.',
            'error' => $e->getMessage(),
        ], 500);
    }
}







    public function update(Request $request)
{
    $student = Student::where('student_id', $request->student_id)->first();
    if ($student) {
        $student->{$request->column} = $request->value;
        $student->save();
        return response()->json(['message' => 'Student updated successfully.']);
    }
    return response()->json(['message' => 'Student not found.'], 404);
}

  

public function updatePhoto(Request $request)
{
    $student = Student::find($request->student_id);
    
    if ($student && $request->hasFile('photo')) {
        // Get the original file name
        $fileName = $request->file('photo')->getClientOriginalName();

        // Store the photo using the original file name
        $path = $request->file('photo')->storeAs('students', $fileName, 'public');
        
        // Update the student's photo path in the database
        $student->photo =   $fileName;
        $student->save();

        return response()->json([
            'success' => true,
            'message' => 'Photo updated successfully.',
            'photoUrl' => asset('storage/students' . $path) // Send the new photo URL back
        ]);
    }
    
    return response()->json(['message' => 'Error updating photo.'], 500);
}



public function destroy($id)
{
    try {
        // Fetch the student record
        $student = Student::findOrFail($id);

        // Check if the student has a photo and delete it
        if ($student->photo) {
            // Use the relative path stored in the database
            $photoPath = str_replace('storage/app/public/', '', $student->photo);

            // Log the path for debugging
            \Log::info("Attempting to delete photo: " . $photoPath);

            if (Storage::disk('public')->exists($photoPath)) {
                Storage::disk('public')->delete($photoPath);
            } else {
                \Log::info("File not found: " . $photoPath);
            }
        }
        // Delete the student record
        $student->delete();

        return response()->json([
            'success' => true,
            'message' => 'Student and associated photo deleted successfully.',
        ]);

    } catch (ModelNotFoundException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Student not found.',
        ], 404);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while deleting the student.',
            'error' => $e->getMessage(),
        ], 500);
    }
}

}

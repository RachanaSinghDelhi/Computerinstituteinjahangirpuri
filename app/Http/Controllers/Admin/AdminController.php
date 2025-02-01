<?php

namespace App\Http\Controllers\Admin; // Updated namespace

use App\Http\Controllers\Controller; // Correct import for the base Controller class
use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
     // Fetch all students with their related courses
     $students  = Student::paginate(10); // Fetch students with pagination

    return view('admin.index', compact('students')); // Pass students to the view
 
      
}

public function bulkUpdateStatus(Request $request)
{
    $request->validate([
        'ids' => 'required|array',
        'ids.*' => 'exists:students,id',
        'status' => 'required|in:Active,Inactive,Completed,Left'
    ]);

    try {
        Student::whereIn('id', $request->ids)->update(['status' => $request->status]);
        return response()->json(['message' => 'Status updated successfully']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error updating status: ' . $e->getMessage()], 500);
    }
}


public function updateStatus(Request $request, Student $student)
{
    $request->validate([
        'status' => 'required|in:Active,Inactive,Completed,Left'
    ]);

    try {
        $student->update(['status' => $request->status]);
        return response()->json(['message' => 'Status updated successfully']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error updating status: ' . $e->getMessage()], 500);
    }
}


}

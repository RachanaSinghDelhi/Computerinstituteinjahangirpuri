<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentVersion;
use App\Models\Student;
use App\Models\User;

class StudentVersionController extends Controller
{
    // Show all pending student updates for approval
    public function index()
    {
        $pendingUpdates = StudentVersion::with('user')->where('status', 'pending')->get();
        return view('dashboard.students.student-approvals', compact('pendingUpdates'));
    }

    // Approve a student update request
    public function approve($id)
    {
        // Find the student version entry
        $studentVersion = StudentVersion::findOrFail($id);
    
        // Decode new_data (if stored as JSON)
        $newData = json_decode($studentVersion->new_data, true);
    
        // Check if new data exists
        if (!$newData) {
            return redirect()->back()->with('error', 'No new data found for approval.');
        }
    
        // Fetch the user who added/updated the student
        $originalTeacher = User::find($studentVersion->updated_by);
    
        // Get the role and name
        $role = $originalTeacher->role ?? 'Unknown Role'; // Adjust based on your role column
        $name = $originalTeacher->name ?? 'Unknown User';
    
        // Store the formatted role with name
        $addedByFormatted = "{$role} ({$name})";
    
        // Find or create the student in the main students table
        $student = Student::updateOrCreate(
            ['student_id' => $studentVersion->student_id], // Find student by ID
            [
                'name'          => $newData['name'] ?? null,
                'father_name'   => $newData['father_name'] ?? null,
                'doa'           => $newData['doa'] ?? null,
                'batch'         => $newData['batch'] ?? null,
                'photo'         => $newData['photo'] ?? null,
                'course_id'     => $newData['course_id'] ?? null,
                'contact_number'=> $newData['contact_number'] ?? null,
                'added_by'      => $addedByFormatted, // ✅ Store "Role (Name)" format
            ]
        );
    
        // Update the student_version status to approved
        $studentVersion->update(['status' => 'approved']);
    
        return redirect()->back()->with('success', 'Student approved successfully.');
    }
    

    

    // Reject a student update request
    public function reject($id)
    {
        $studentVersion = StudentVersion::findOrFail($id);

        // Mark the request as rejected
        $studentVersion->update(['status' => 'rejected']);

        return redirect()->back()->with('error', 'Student update rejected.');
    }
}

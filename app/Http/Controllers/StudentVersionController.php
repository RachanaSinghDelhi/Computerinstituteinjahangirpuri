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
        $role = $originalTeacher->role ?? 'Unknown Role';
        $name = $originalTeacher->name ?? 'Unknown User';
    
        // Store the formatted role with name
        $addedByFormatted = "{$role} ({$name})";
    
        // Find the student by ID
        $student = Student::where('student_id', $studentVersion->student_id)->first();
    
        // If the student doesn't exist, create a new record
        if (!$student) {
            $student = Student::create([
                'student_id'    => $studentVersion->student_id,
                'name'          => $newData['name'] ?? 'Unknown',
                'father_name'   => $newData['father_name'] ?? 'Unknown',
                'doa'           => $newData['doa'] ?? null,
                'batch'         => $newData['batch'] ?? null,
                'photo'         => $newData['photo'] ?? null,
                'course_id'     => $newData['course_id'] ?? null,
                'contact_number'=> $newData['contact_number'] ?? null,
                'added_by'      => $addedByFormatted,
            ]);
        } else {
            // If only batch is updated by a teacher, keep other values unchanged
            if ($role === 'Teacher' && isset($newData['batch'])) {
                $student->batch = $newData['batch'];
                $student->save();
            }
        }
    
        // Approve the student update request
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

    public function getNotifications()
    {
        // Fetch pending approval requests
        $notifications = StudentVersion::where('status', 'pending')->orderBy('updated_at', 'desc')->get();
    
        $formattedNotifications = $notifications->map(function ($notification) {
            $oldData = json_decode($notification->old_data, true);
            $newData = json_decode($notification->new_data, true);
    
            // Determine notification type
            if (empty($oldData)) {
                $type = 'New Student Added';
                $message = "New Student Added (ID: {$notification->student_id})";
            } elseif (isset($oldData['batch']) && isset($newData['batch']) && $oldData['batch'] !== $newData['batch']) {
                $type = 'Batch Change';
                $message = "Batch Change for Student ID: {$notification->student_id}";
            } else {
                $type = 'Student Update';
                $message = "Update Request for Student ID: {$notification->student_id}";
            }
    
            return [
                'id' => $notification->id,
                'student_id' => $notification->student_id,
                'message' => $message,
                'type' => $type,
                'updated_at' => $notification->updated_at->diffForHumans()
            ];
        });
    
        return response()->json([
            'count' => $formattedNotifications->count(),
            'notifications' => $formattedNotifications
        ]);
    }
    

}

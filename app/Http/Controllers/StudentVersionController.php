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

    // Approve a student update requestpublic
    // 
     function approve($id)
{
    $studentVersion = StudentVersion::findOrFail($id);
    
    if ($studentVersion->status !== 'pending') {
        return redirect()->back()->with('error', 'This request has already been processed.');
    }

    // Get old and new data
    $oldData = json_decode($studentVersion->old_data, true);
    $newData = json_decode($studentVersion->new_data, true);

    // Find the student record
    $student = Student::where('student_id', $studentVersion->student_id)->first();
    
    if ($student) {
        // Update only the changed fields
        foreach ($newData as $key => $value) {
            if ($value !== ($oldData[$key] ?? null)) {
                $student->$key = $value;
            }
        }

      

        $student->save();
    } else {
        // Create new student if it doesn't exist
        if (!isset($newData['student_id'])) {
            $newData['student_id'] = $studentVersion->student_id;
        }

       

        Student::create($newData);
    }

    // Mark the version as approved
    $studentVersion->status = 'approved';
    $studentVersion->save();

    return redirect()->route('super_admin.student-approvals')->with('success', 'Student update approved.');
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

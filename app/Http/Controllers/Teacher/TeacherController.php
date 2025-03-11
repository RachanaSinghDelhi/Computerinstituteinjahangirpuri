<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller; // Correct import for the base Controller class
use App\Models\Student;
use App\Models\Course;
use App\Models\StudentVersion;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teacherId = auth()->id();

    // Fetch all courses in an associative array [id => course_name]
    $courses = Course::pluck('course_name', 'id')->toArray();

    // Fetch students added or updated by the logged-in teacher
    $students = StudentVersion::where('updated_by', $teacherId)->get();

    // Filter out batch-only updates
    $filteredStudents = $students->filter(function ($student) {
        $oldData = json_decode($student->old_data, true) ?? [];
        $newData = json_decode($student->new_data, true) ?? [];

        // Check if the only changed field is 'batch'
        if (count($newData) === 1 && isset($newData['batch'])) {
            return false; // Exclude batch-only updates
        }

        return true; // Include all other records
    });

    // Attach course names
    foreach ($filteredStudents as $student) {
        $student->new_data = json_decode($student->new_data, true) ?? [];
        $courseId = $student->new_data['course_id'] ?? null;
        $student->course_name = $courses[$courseId] ?? 'N/A';
    }

    return view('teacher.index', ['students' => $filteredStudents]);
}
}

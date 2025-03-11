<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller; // Correct import for the base Controller class
use App\Models\Student;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $courses = Course::all(); 
        $students = Student::all(); // Get all students initially
        return view('teacher.index', compact('courses', 'students')); // Your teacher dashboard view
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $orderedCourses = Course::orderByDesc('created_at')->get();
        return view('dashboard.index', ['courses' => $orderedCourses]);

       // return view('dashboard.index', compact('courses'));
      
    }

}

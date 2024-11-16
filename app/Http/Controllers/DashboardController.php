<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   
        public function index()
        {
            $courses = Course::paginate(10); // Add order and pagination
            return view('dashboard.index', compact('courses')); // Pass 'courses' to view
        }
    

}

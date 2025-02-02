<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   
        public function index()
        {
            $courselist = Course::all();
            return view('dashboard.index', compact('courselist')); // Pass 'courses' to view
        }
    

}

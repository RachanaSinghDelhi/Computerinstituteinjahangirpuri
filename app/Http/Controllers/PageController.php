<?php

namespace App\Http\Controllers;
use App\Models\Course;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
      
        // Fetch all courses from the database
            $courses = Course::all();
            return view('about', compact('courses'));
    
    
    }
    public function contact()
    {
      
        // Fetch all courses from the database
         
            return view('contact');
    
    
    }

    public function showHomepage()
{
    $latestPosts = Post::latest()->take(4)->get();
    return view('index', compact('latestPosts'));
}
}

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

        // Define breadcrumbs for the 'About' page
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'About', 'url' => url('/about')],
        ];

        return view('about', compact('courses', 'breadcrumbs'));
    }

    public function contact()
    {
        // Define breadcrumbs for the 'Contact' page
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Contact', 'url' => url('/contact')],
        ];

        return view('contact', compact('breadcrumbs'));
    }


    
}

<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCourses()
    {
        $courses = Course::limit(7)->get();
        
        // Breadcrumb for Home > Courses
        $breadcrumbs = [
            ['title' => 'Home', 'url' => url('/')],
            ['title' => 'Courses', 'url' => route('courses.index')], // Changed to 'courses.index'
        ];
        
        return view('index', compact('courses', 'breadcrumbs'));
    }

    public function show($id)
    {
        // Fetch course details by id
        $course = Course::findOrFail($id);
        $courses = Course::limit(7)->get();
        
        // Breadcrumb for Home > Courses > Course Detail
        $breadcrumbs = [
            ['title' => 'Home', 'url' => url('/')],
            ['title' => 'Courses', 'url' => route('courses.index')], // Changed to 'courses.index'
            ['title' => $course->course_title, 'url' => route('course.show', $id)], // Correctly passes 'id'
        ];
        
        return view('show', compact('course', 'courses', 'breadcrumbs'));
    }

    public function about()
    {
        $courses = Course::all();
        
        // Breadcrumb for Home > About
        $breadcrumbs = [
            ['title' => 'Home', 'url' => url('/')],
            ['title' => 'About', 'url' => route('about')],
        ];
        
        return view('about', compact('courses', 'breadcrumbs'));
    }

    // Other methods would follow a similar pattern

    public function edit($id)
{
    // Fetch the course by its ID
    $course = Course::findOrFail($id);
    
    // Return the edit view with the course data
    return view('dashboard.course_edit', compact('course'));
}

}

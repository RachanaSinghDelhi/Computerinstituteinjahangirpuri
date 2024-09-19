<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_title' => 'required',
            'course_desc' => 'required',
            'course_content' => 'required',
            'course_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'course_url' => 'nullable|string',
        ]);

        if ($request->hasFile('course_image')) {
            $imageName = uniqid() . '_' . $request->file('course_image')->getClientOriginalName();
            $imagePath = $request->file('course_image')->storeAs('public', $imageName);
            $validatedData['course_image'] = str_replace('public/', '', $imagePath);
        }

        if (empty($request->course_url)) {
            $validatedData['course_url'] = strtolower(str_replace(' ', '-', $request->course_title)); // Simple slug
        }

        try {
            Course::create($validatedData);
            return redirect('dashboard')->with('success', 'Course created successfully.');
        } catch (\Exception $e) {
            return redirect('dashboard')->with('error', 'Failed to create course. Please try again.');
        }
    }

    public function create()
    {
        return view('dashboard.course');
    }

    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->get();
        return view('dashboard.index', compact('courses'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('dashboard.course_edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'course_title' => 'required',
            'course_desc' => 'required',
            'course_content' => 'required',
            'course_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'course_url' => 'nullable|string',
        ]);

        $course = Course::findOrFail($id);

        if ($request->hasFile('course_image')) {
            $imageName = uniqid() . '_' . $request->file('course_image')->getClientOriginalName();
            $imagePath = $request->file('course_image')->storeAs('public', $imageName);
            $validatedData['course_image'] = str_replace('public/', '', $imagePath);
        }
         // If no custom `course_url` is provided, generate it from the course title
    if (empty($request->course_url)) {
        $validatedData['course_url'] = strtolower(str_replace(' ', '-', $request->course_title));
    }
        

        $course->update($validatedData);

        return redirect('/dashboard')->with('success', 'Course updated successfully');
    }

    public function destroy($id)
{
    // Find the course by its ID
    $course = Course::findOrFail($id);

    // Check if the course has an associated image and delete it from storage
    if ($course->course_image) {
        $imagePath = storage_path('app/public/' . $course->course_image);

        // Check if the file exists and delete it
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Delete the course from the database
    $course->delete();

    return response()->json(['message' => 'Course and associated image deleted successfully']);
}


public function showCourses()
    {
        $courses = Course::limit(7)->get(); // Fetch only 7 courses
        return view('index', ['courses' => $courses]); // Pass courses to the 'home' view
        
    }


    public function show($id)
    {
        // Fetch the course by ID
        $course = Course::findOrFail($id);
        $courses = Course::limit(7)->get();
        // Pass the course data to the view located directly in 'views/'
        return view('show', compact('course', 'courses'));
    }

    public function about()
    {
        // Fetch any data you need for the About page
        $courses = Course::all(); // Example, adjust as needed

        return view('about', compact('courses')); // Adjust view name as necessary
    }
}
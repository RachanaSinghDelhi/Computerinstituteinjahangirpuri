<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Show a list of courses (index)
    public function index()
    {
        // Fetch the latest 7 courses
        $courses = Course::limit(7)->get();

        // Breadcrumb for Home > Courses
        $breadcrumbs = [
            ['title' => 'Home', 'url' => url('/')],
            ['title' => 'Courses', 'url' => route('courses.index')],
        ];

        return view('index', compact('courses', 'breadcrumbs'));
    }

    // Show a single course detail
    public function show($id)
    {
        // Fetch course details by id
        $course = Course::findOrFail($id);
        $courses = Course::limit(7)->get();

        // Breadcrumb for Home > Courses > Course Detail
        $breadcrumbs = [
            ['title' => 'Home', 'url' => url('/')],
            ['title' => 'Courses', 'url' => route('courses.index')],
            ['title' => $course->course_title, 'url' => route('course.show', $id)],
        ];

        return view('show', compact('course', 'courses', 'breadcrumbs'));
    }

    // Show the 'about' page with all courses
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

    // Edit a specific course
    public function edit($id)
    {
        // Fetch the course by its ID
        $course = Course::findOrFail($id);

        // Breadcrumb for Home > Courses > Edit Course
        $breadcrumbs = [
            ['title' => 'Home', 'url' => url('/')],
            ['title' => 'Courses', 'url' => route('courses.index')],
            ['title' => 'Edit Course', 'url' => route('course.edit', $id)],
        ];

        // Return the edit view with the course data
        return view('dashboard.course_edit', compact('course', 'breadcrumbs'));
    }

    // Update the course
    public function update(Request $request, $id)
    {
        // Validate incoming data
        $validated = $request->validate([
            'course_title' => 'required|string|max:255',
            'description' => 'required|string',
            // Add any other fields to be updated
        ]);

        // Find the course by ID
        $course = Course::findOrFail($id);

        // Update the course's attributes
        $course->course_title = $validated['course_title'];
        $course->description = $validated['description'];
        // Update other fields as necessary

        // Save the updated course
        $course->save();

        // Redirect with a success message
        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    // Delete a course
    public function destroy($id)
    {
        // Find the course by ID
        $course = Course::findOrFail($id);

        // Delete the course
        $course->delete();

        // Redirect with a success message
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }
}

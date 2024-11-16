<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CourseController extends Controller
{


    public function index()
    {
        // Add pagination here, e.g., 10 courses per page
        $courses = Course::paginate(10); // Adjust the number of items per page as needed

        // Return the view with paginated courses
        return view('dashboard.index', compact('courses'));
    }

    /**
     * Show the form for creating a new course.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the view for adding a new course
        return view('dashboard.course'); // Ensure this view file exists in the correct location
    }

    /**
     * Store a newly created course in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'course_title' => 'required|string|max:255',
            'course_desc' => 'required|string',
            'course_content' => 'required|string',
            'course_url' => 'nullable',
            'course_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the image upload (if any)
        $imagePath = null;
        if ($request->hasFile('course_image')) {
            // Generate a random name for the image
            $imageName = Str::random(10) . '.' . $request->file('course_image')->getClientOriginalExtension();
            
            // Store the image in the 'courses' folder
            $imagePath = $request->file('course_image')->storeAs('courses', $imageName, 'public');
            
            // Update the request with the new image path (optional)
            $request->course_image = $imagePath;
        }

        // Create the new course
        Course::create([
            'course_title' => $request->course_title,
            'course_desc' => $request->course_desc,
            'course_content' => $request->course_content,
            'course_url' => $request->course_url,
            'course_image' => $imagePath,
        ]);

        // Redirect back to the main dashboard with a success message
        return redirect()->route('dashboard.index')->with('success', 'Course created successfully!');
    }

    public function edit($id)
    {
        // Find the course by ID
        $course = Course::findOrFail($id); // This will return a 404 error if the course is not found
        
        // Return the edit view with the course data
        return view('dashboard.course_edit', compact('course'));
    }

   
   public function update(Request $request, Course $course)
{
    // Validate the incoming request
    $request->validate([
        'course_title' => 'required|string|max:255',
        'course_desc' => 'required|string',
        'course_content' => 'required|string',
        'course_url' => 'nullable|url',
        'course_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Handle the image upload (if any)
    if ($request->hasFile('course_image')) {
        // Delete the old image if a new one is uploaded
        if ($course->course_image) {
            \Storage::delete($course->course_image);
        }

        // Generate a random name for the image
        $imageName = Str::random(10) . '.' . $request->file('course_image')->getClientOriginalExtension();

        // Store the image in the 'courses' folder
        $imagePath = $request->file('course_image')->storeAs('courses', $imageName, 'public');
    } else {
        // If no new image is uploaded, keep the existing image
        $imagePath = $course->course_image;
    }

    // Update the course details
    $course->update([
        'course_title' => $request->course_title,
        'course_desc' => $request->course_desc,
        'course_content' => $request->course_content,
        'course_url' => $request->course_url,
        'course_image' => $imagePath,
    ]);

    // Redirect back to the main dashboard with a success message
    return redirect()->route('dashboard.index')->with('success', 'Course updated successfully!');
}

public function destroy($id)
{
    $course = Course::find($id);

    if ($course) {
        $course->delete();
        return redirect()->back()->with('success', 'Course deleted successfully.');
    }

    return redirect()->back()->with('error', 'Course not found.');
}




}

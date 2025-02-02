<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
{
    $courselist = Course::all();
    return view('dashboard.courses.display_courses', compact('courselist'));
}
    /**
     * Show the form for creating a new course.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the view for adding a new course
        return view('dashboard.courses.add_course'); // Ensure this view file exists in the correct location
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
        'course_name' => 'required|string|max:255',
        'course_desc' => 'required|string',
        'course_content' => 'required|string',
        'course_url' => 'nullable|string',
        'course_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'duration' => 'nullable|integer|min:1', // Ensure it's an integer and at least 1 month
        'total_fees' => 'nullable|numeric|min:0', // Ensure it's a positive number
        'installments' => 'nullable|integer|min:1', // At least 1 installment
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

        // Ensure the course_url is always in lowercase, even if the user provides it in uppercase
        $courseUrl = $request->course_url ? strtolower($request->course_url) : Str::slug(strtolower($request->course_title));

        // Create the new course
        Course::create([
            'course_title' => $request->course_title,
            'course_name' => $request->course_name,
            'course_desc' => $request->course_desc,
            'course_content' => $request->course_content,
            'course_url' => $courseUrl,  // Save course_url in lowercase
            'course_image' => $imageName ?? null,  // Image name, if provided
            'duration' => $request->duration, // Duration in months
            'total_fees' => $request->total_fees, // Total fees for the course
            'installments' => $request->installments, // Number of installments
        ]);

        // Redirect back to the main dashboard with a success message
        return redirect()->route('course.index')->with('success', 'Course created successfully!');
    }

    // Show the edit form for a specific course
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('dashboard.courses.course_edit', compact('course'));
    }

    // Update the course in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_title' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
            'course_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'course_desc' => 'nullable|string',
            'course_content' => 'nullable|string',
            'course_url' => 'nullable|string', // Allow course_url to be nullable
            'duration' => 'nullable|integer|min:1', // Ensure it's an integer and at least 1 month
            'total_fees' => 'nullable|numeric|min:0', // Ensure it's a positive number
            'installments' => 'nullable|integer|min:1', // At least 1 installment
        ]);

        $course = Course::findOrFail($id);
        
        // Handle image upload if a new image is provided
        if ($request->hasFile('course_image')) {
            // Delete the old image if it exists
            if ($course->course_image && Storage::exists('public/courses/'.$course->course_image)) {
                Storage::delete('public/courses/'.$course->course_image);
            }

            // Store the new image in the courses folder and get the file name
            $imageName = $request->course_image->store('courses', 'public');
            $course->course_image = basename($imageName);
        }

        // Ensure the course_url is always in lowercase, even if the user provides it in uppercase
        $courseUrl = $request->course_url ? strtolower($request->course_url) : Str::slug(strtolower($request->course_title));

        // Update the course details
        $course->course_title = $request->course_title;
        $course->course_name = $request->course_name;
        $course->course_desc = $request->course_desc;
        $course->course_content = $request->course_content;
        $course->course_url = $courseUrl;  // Save course_url in lowercase
        $course->duration = $request->duration;
        $course->total_fees = $request->total_fees;
        $course->installments = $request->installments;


        $course->save();

        return redirect()->route('course.index')->with('success', 'Course updated successfully!');
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

    public function show($course_url)
    {
        // Find the course by its course_url or return a 404 error if not found
        $course = Course::where('course_url', $course_url)->firstOrFail();

        // Prepare breadcrumbs with course_url
        $breadcrumbs = [
            ['title' => 'Home', 'url' => url('/')],
            ['title' => 'Courses', 'url' => url('/courses')],  // Use route('courses.index') in the URL
            ['title' => $course->course_title, 'url' => url('/courses/' . $course->course_url)]  // Use course_url in the URL
        ];

        // Return the view for displaying the course details, passing the course data and breadcrumbs
        return view('show', compact('course', 'breadcrumbs'));  // 'show' corresponds to resources/views/show.blade.php
    }


    public function search(Request $request)
{
    $query = $request->input('query');
    $courselist = Course::where('course_title', 'LIKE', "%{$query}%")
                        ->orWhere('course_desc', 'LIKE', "%{$query}%")
                        ->paginate(10); // Adjust pagination as needed
    
    $html = '';
    foreach (   $courselist as $course) {
        $html .= view('dashboard.courses.courses_search', compact('courselist'))->render();
    }
    return response()->json($html);
}

}

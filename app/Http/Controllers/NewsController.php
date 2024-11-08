<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    // Display the list of news items
    public function index()
    {
        $newsItems = News::latest()->get(); // Fetch all news items, ordered by latest
        $courses = Course::all(); // Fetch all courses for the header
        return view('dashboard.news', compact('newsItems','courses')); // Use 'dashboard.news' to load the correct Blade file
    }
    

    // Store a new news item
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Create a new news entry in the database
        News::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'News added successfully');
    }
}

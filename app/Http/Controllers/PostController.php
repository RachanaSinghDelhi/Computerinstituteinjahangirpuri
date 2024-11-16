<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Show the form to create a new post
    public function create()
    {
        return view('dashboard.create_post');
    }

    // Store a new post in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('dashboard.new_posts')->with('success', 'Post created successfully.');
    }

    // Display the list of posts
    public function index()
    {
        $posts = Post::latest()->get();
        
        // Breadcrumbs for the 'Updates' page
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Updates', 'url' => route('posts.index')],
        ];

        return view('dashboard.new_post', compact('posts', 'breadcrumbs'));
    }

    // Display posts on the "Updates" (blogs) page
    public function blogs()
    {
        $posts = Post::latest()->get();
        
        // Breadcrumbs for the main 'Updates' page
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Updates', 'url' => route('posts.blogs')],
        ];

        return view('blogs', compact('posts', 'breadcrumbs'));
    }

    // Display a single post
    public function show($id)
    {
        $post = Post::findOrFail($id);

        // Breadcrumbs for a specific post in 'Updates'
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Updates', 'url' => route('posts.blogs')],
            ['name' => $post->title, 'url' => route('posts.show', $id)],
        ];

        return view('single_post', compact('post', 'breadcrumbs'));
    }

    // Show homepage with latest posts
    


    // In your controller (e.g., PostController.php)

    public function showSidebar()
    {
        // Fetch the latest posts
        $latestPosts = Post::latest()->take(5)->get(); // Adjust the number of posts as needed
    
        // Define breadcrumbs for the 'about' page
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'About', 'url' => route('posts.about')],
        ];
    
        // Pass both latestPosts and breadcrumbs to the view
        return view('about', compact('latestPosts', 'breadcrumbs'));
    }
    
}

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
         
            'tags' => 'nullable|string',
            'url' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->tags = $request->tags;
         $post->url = $request->url;
        
        $post->user_id = auth()->id();
        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('dashboard.new_posts')->with('success', 'Post created successfully.');
    }


    public function edit($id){

        $post = Post::findOrfail($id);
        return view('dashboard.edit_post', compact('post'));

    }

    public function update(Request $request, $id){
        $request->validate([
            'title' =>'required|string|max:255',
            'content' =>'required',
            'tags' => 'nullable|string',
            'url' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->tags = $request->tags;
        $post->url = $request->url;

        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('dashboard.new_posts')->with('success', 'Post updated successfully.');
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
        $latestPosts = Post::latest()->take(5)->get();
        // Breadcrumbs for the main 'Updates' page
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Updates', 'url' => route('posts.blogs')],
        ];

        return view('blogs', compact('posts', 'breadcrumbs','latestPosts'));
    }

    // Display a single post
    public function show($url)
    {
        // Fetch the specific post by URL (slug), including the author relation
        $post = Post::with('author')->where('url', $url)->firstOrFail();
    
        // Fetch latest 9 posts for pagination (excluding the current post)
        $posts = Post::latest()->where('id', '!=', $post->id)->paginate(9);
    
        // Get the latest 5 posts
        $latestPosts = Post::latest()->take(5)->get();
    
        // Breadcrumbs for a specific post in 'Updates'
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Updates', 'url' => route('posts.blogs')],
            ['name' => $post->title, 'url' => route('posts.show', $post->url)], // Use post URL here
        ];
    
        // Return the single post view with necessary data
        return view('single_post', compact('post', 'posts', 'breadcrumbs', 'latestPosts'));
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

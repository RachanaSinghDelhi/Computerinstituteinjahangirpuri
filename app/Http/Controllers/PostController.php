<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Show the form to create a new post
    public function create()
    {
        return view('dashboard.create_post'); // Displays the post creation form
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

    // Display the list of posts in tabular format
    public function index()
    {
        $posts = Post::latest()->get(); // Fetch all posts for display in the new_post view
        return view('dashboard.new_post', compact('posts'));
    }


    public function blogs()
    {
        $posts = Post::latest()->get(); // Fetch posts in descending order
        return view('blogs', compact('posts'));
    }


    public function show($id)
{
    $post = Post::findOrFail($id);
    return view('single_post', compact('post'));
}





 // Show form to edit a post
 public function edit($id)
 {
     $post = Post::findOrFail($id);
     return view('dashboard.edit_post', compact('post'));
 }

 // Update a post
 public function update(Request $request, $id)
 {
     $post = Post::findOrFail($id);

     $request->validate([
         'title' => 'required|max:255',
         'content' => 'required',
         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
     ]);

     if ($request->hasFile('image')) {
         // Delete the old image if exists
         if ($post->image && file_exists(storage_path('app/public/' . $post->image))) {
             unlink(storage_path('app/public/' . $post->image));
         }

         // Save the new image
         $imagePath = $request->file('image')->store('posts', 'public');
         $post->image = $imagePath;
     }

     $post->title = $request->input('title');
     $post->content = $request->input('content');
     $post->save();

     return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
 }

 // Delete a post
 public function destroy($id)
 {
     $post = Post::findOrFail($id);
     // Delete the post image if exists
     if ($post->image && file_exists(storage_path('app/public/' . $post->image))) {
         unlink(storage_path('app/public/' . $post->image));
     }
     $post->delete();

     return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
 }


}

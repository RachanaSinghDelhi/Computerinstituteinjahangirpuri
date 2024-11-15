<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $slides = [
            (object)['image' => 'slide1.jpg', 'title' => 'Welcome to Nice Web Technologies', 'description' => 'Learn Web Design and more.'],
            (object)['image' => 'slide2.jpg', 'title' => 'Advance Excel Training', 'description' => 'Master your Excel skills.'],
            (object)['image' => 'slide3.jpg', 'title' => 'Tally ERP and Busy Software', 'description' => 'Become a Tally expert.']
        ];
       
        $latestPosts = Post::latest()->take(4)->get();

        // Breadcrumbs for the homepage
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
        ];

        return view('index', compact('latestPosts', 'breadcrumbs','slides'));
        
    }

    
}

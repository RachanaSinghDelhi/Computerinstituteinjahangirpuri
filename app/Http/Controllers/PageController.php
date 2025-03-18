<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Course;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        // Fetch all courses and the latest posts
        $courses = Course::all();
        $latestPosts = Post::latest()->take(5)->get(); // Fetch recent posts for sidebar

        // Define breadcrumbs for the 'About' page
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'About', 'url' => url('/about')],
        ];

        return view('about', compact('courses', 'latestPosts', 'breadcrumbs'));
    }

    public function contact()
    {
        // Fetch the latest posts for sidebar
        $latestPosts = Post::latest()->take(5)->get();

        // Define breadcrumbs for the 'Contact' page
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Contact', 'url' => url('/contact')],
        ];

        return view('contact', compact('latestPosts', 'breadcrumbs'));
    }

    public function faq()
    {
        // Fetch the latest posts for sidebar
        $latestPosts = Post::latest()->take(5)->get();

        // Define breadcrumbs for FAQ page
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'FAQ', 'url' => route('faq')],
        ];

        return view('faq', compact('latestPosts', 'breadcrumbs'));
    }

    public function privacyPolicy()
    {
        // Fetch the latest posts for sidebar
        $latestPosts = Post::latest()->take(5)->get();

        // Define breadcrumbs for Privacy Policy page
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Privacy Policy', 'url' => route('privacy-policy')],
        ];

        return view('privacy_policy', compact('latestPosts', 'breadcrumbs'));
    }
    public function terms()
    {
        // Fetch the latest posts for sidebar
        $latestPosts = Post::latest()->take(5)->get();

        // Define breadcrumbs for Privacy Policy page
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Privacy Policy', 'url' => route('terms')],
        ];

        return view('terms_and_conditions', compact('latestPosts', 'breadcrumbs'));
    }


    public function showIntroductionPage()
    {

          // Fetch the latest posts for sidebar
          $latestPosts = Post::latest()->take(5)->get();
        // Define breadcrumbs for the Introduction page
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Introduction', 'url' => route('introduction.page')],
        ];
    
        // Load the view for the Introduction page and pass breadcrumbs to the view
        return view('Introduction', compact('breadcrumbs', 'latestPosts'));
    }

    

    public function courses() 
    {

        $latestPosts = Post::latest()->take(5)->get();
 
        $courses = Course::take(7)->get();
        $breadcrumbs=[
            ['name'=>'Home', 'url'=>url('/')],
            ['name'=>'Courses', 'url'=>route('courses')],  //route name for courses page
        ];
        return view('courses', compact('courses', 'latestPosts','breadcrumbs'));
    }
    
}

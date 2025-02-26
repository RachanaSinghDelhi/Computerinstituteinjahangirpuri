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
            [
                'image' => 'assets/images/Sliders_image/banner_Nice_Web.png',
                'alt' => 'Computer Institute in Jahangirpuri',
                'title' => 'Best Computer Training in Jahangirpuri, Delhi',
                'description' => 'Since 2001, Nice Computer Institute in Jahangirpuri offers top courses like Graphic Design, Tally, Marg ERP, Web Dev. Enroll now to upgrade your skills!',
                'link' => '/introduction',
            ],
            [
                'image' => 'assets/images/Sliders_image/banner_Nice_Web1.png',
                'alt' => 'Medal at Nice Computer Institute in Jahangirpuri',
                'title' => 'Basic Courses',
                'description' => 'Nice Computer Institute provides the best job-oriented computer courses in Jahangirpuri. This course comprises of...',
                'link' => '/courses/basic',
            ],
            [
                'image' => 'assets/images/Sliders_image/banner_Niceweb2.gif',
                'alt' => 'Annual Function at Nice Computer Institute in Jahangirpuri',
                'title' => 'Advance Excel',
                'description' => 'Advanced Excel institute in Jahangirpuri. Nice Computer is known for Excel developers who channel their skills into building applications and dashboards.',
                'link' => '/courses/advance-excel',
            ],
             [
                'image' => 'assets/images/Sliders_image/banner_niceweb3.gif',
                'alt' => 'AutoCAD at Nice Computer Institute in Jahangirpuri',
                'title' => 'Python Training',
                'description' => 'Learn Python Programming from scratch at Nice Web Technologies, Jahangirpuri. Our comprehensive course is designed for beginners.',
                'link' => '/courses/python',
            ],
            [
                'image' => 'assets/images/Sliders_image/banner_nicewebtechnologies_graphic.gif',
                'alt' => 'Graphic Design at Nice Computer Institute in Jahangirpuri',
                'title' => 'Graphic Design',
                'description' => 'Explore Graphic Design Concepts & Practices including typography, color, layout, and more.',
                'link' => '/courses/graphic-design',
            ],
        ];

       
        $latestPosts = Post::latest()->take(4)->get();

        // Breadcrumbs for the homepage
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
        ];

        return view('index', compact('latestPosts', 'breadcrumbs','slides'));
        
    }

    
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function store(Request $request)
    {
        $newAbout = new About();
        $newAbout->title = $request->input('title');
        $newAbout->des = $request->input('des');
        $newAbout->content = $request->input('content');
        $newAbout->save();

        return redirect()->route('about.index')->with('success', 'About information added successfully!');
    }
}

// Import the About model at the top of your controller file


// Inside your controller class, add the storeAbout method or any other method where you want to create a new record


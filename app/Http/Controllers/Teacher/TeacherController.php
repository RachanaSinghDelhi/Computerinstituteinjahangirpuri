<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller; // Correct import for the base Controller class

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher.index'); // Your teacher dashboard view
    }
}

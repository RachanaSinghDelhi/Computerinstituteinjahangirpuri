<?php
namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller; // Correct import for the base Controller class

use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        return view('students.index'); // Your student dashboard view
    }
}

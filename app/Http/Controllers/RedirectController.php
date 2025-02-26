<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $role = Auth::user()->role;

        switch ($role) {
            case 'super_admin':
                return redirect()->route('super_admin.dashboard');
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'teacher':
                return redirect()->route('teacher.dashboard');
            case 'student':
                return redirect()->route('student.dashboard');
            default:
                return redirect('/'); // Fallback if no role is set
        }
    }
}

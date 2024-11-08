<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('admin_login'); // Updated to match your custom Blade view name
    }

    // Handle login request
    public function login(Request $request)
    {
        // Validate the login fields
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt login
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard.index'); // Adjust dashboard route if needed
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Handle logout request
    public function logout(Request $request)
{
    Auth::logout();  // Log the user out

    $request->session()->invalidate();  // Invalidate the session
    $request->session()->regenerateToken();  // Regenerate the CSRF token

    return redirect('/admin/login');  // Redirect to the login page
}
}

<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Post;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        // Fetch all courses and the latest posts
        $courses = Course::all();
        $latestPosts = Post::latest()->take(5)->get(); // Fetch recent posts for sidebar

        // Define breadcrumbs for the 'About' page
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Login', 'url' => url('/login')],
        ];

        return view('auth.login', compact('courses', 'latestPosts', 'breadcrumbs'));
    }

    // Handle login request
   // Handle login request
   public function login(Request $request)
   {
       // Validate the login fields
       $request->validate([
           'email' => 'required|email',
           'password' => 'required|min:6',
           'role' => 'required|in:admin,teacher,student',
       ]);

       // Attempt login for the specified role
       $user = User::where('email', $request->email)
                   ->where('role', $request->role)
                   ->first();

       // If user is found and password is correct
       if ($user && Hash::check($request->password, $user->password)) {
           Auth::login($user);

           // Redirect based on the user's role
           switch ($user->role) {
               case 'admin':
                   return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
               case 'teacher':
                   return redirect()->route('teacher.dashboard'); // Redirect to teacher dashboard
               case 'student':
                   return redirect()->route('student.dashboard'); // Redirect to student dashboard
               default:
                   return redirect()->route('login')->withErrors(['role' => 'Role not recognized']);
           }
       }

       return back()->withErrors(['email' => 'Invalid credentials']);
   }

   // Handle logout request
   public function logout(Request $request)
   {
       Auth::logout();  // Log the user out

       $request->session()->invalidate();  // Invalidate the session
       $request->session()->regenerateToken();  // Regenerate the CSRF token

       return redirect('/login');  // Redirect to the login page
   }
}

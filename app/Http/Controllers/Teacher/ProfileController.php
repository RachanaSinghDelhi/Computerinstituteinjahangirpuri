<?php
namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller; // Correct import for the base Controller class
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    // Show the profile page
    public function show()
    {
        $user = Auth::user();
        return view('teacher/profile/profile', compact('user'));
    }

    // Update the profile
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'username' => 'required|string|unique:users,username,' . $user->id,
            'old_password' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed', // Ensures new password matches confirmation
        ]);
    
        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
    
        // If the user wants to change their password
        if ($request->filled('password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->with('password_error', 'Old password does not match.');
            }
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
    
}

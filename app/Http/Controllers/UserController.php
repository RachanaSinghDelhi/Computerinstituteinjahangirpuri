<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::where('role', '!=', 'super_admin')->get(); // Exclude super_admin from listing
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('dashboard.users.users');
    }

    /**
     * Store a newly created user in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,teacher,student',
        ]);
 // Generate username: name + random 5-digit number
 $randomNumber = rand(10000, 99999);
 $username = strtolower(str_replace(' ', '_', $request->name)) . $randomNumber;
        User::create([
            'name' => $request->name,
            'username'=>$username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    /**
     * Show the form for editing a user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the user's role and details.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,teacher,student',
            'password' => 'nullable|min:6|confirmed', // Password confirmation required
        ]);
    
        $data = [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];
    
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
    
        $user->update($data);
    
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }
    

    /**
     * Remove the specified user from the database.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->role === 'super_admin') {
            return redirect()->route('users.index')->with('error', 'Super Admin cannot be deleted.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }


    public function addActiveStudentsToUsers()
    {
        // ✅ Fetch students with "ongoing" course_status
        $ongoingStudents = Student::where('course_status', 'ongoing')->get();
    
        foreach ($ongoingStudents as $student) {
            // Generate a random 5-digit number for email if needed
            $randomNumber = rand(10000, 99999);
            $email = $student->email ?? "nice{$randomNumber}{$student->student_id}@nicewebtechnologies.com";
    
            $username = strtolower(str_replace(' ', '_', $student->name)) . $randomNumber;
           // ✅ Use student's contact_number as the password and hash it
        $password = bcrypt($student->contact_number);
            // ✅ Use updateOrCreate to prevent duplicates
            User::updateOrCreate(
                ['student_id' => $student->student_id], // Ensure uniqueness
                [
                    'name' => $student->name,
                     'username' => $username,
                  
                    'email' => $email,
                    'password' =>  $password,
                    'role' => 'student',
                    'updated_at' => now(),
                ]
            );
        }
    
        // ✅ Remove students from users table if course_status is NOT "ongoing"
        $nonOngoingStudentIds = Student::where('course_status', '!=', 'ongoing')->pluck('student_id')->toArray();
        User::whereIn('student_id', $nonOngoingStudentIds)->delete(); // Remove users if status changes
    
        return redirect()->back()->with('success', 'Student records synchronized successfully.');
    }
}
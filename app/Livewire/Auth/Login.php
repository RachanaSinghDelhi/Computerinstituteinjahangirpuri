<?php
namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Login extends Component
{
    public $email, $password, $role;

    public function login()
    {
        $this->validate([
            'email' => 'required|string',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,teacher,student',
        ]);

         // Find user by email or username
    $user = User::where('email', $this->email)
    ->orWhere('username', $this->email) // Check username as well
    ->first();
    
        // Check if user exists and verify password
        if ($user && Hash::check($this->password, $user->password)) {
            // Check if the role matches
            if ($user->role !== $this->role) {
                session()->flash('error', 'Invalid role selection.');
                return;
            }

            // Log in the user
            Auth::login($user);
            session()->regenerate();

            return match ($user->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'teacher' => redirect()->route('teacher.dashboard'),
                'student' => redirect()->route('student.dashboard'),
                default => redirect()->route('login'),
            };
        }

        session()->flash('error', 'Invalid credentials');
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layout.app');
    }
}

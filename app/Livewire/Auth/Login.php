<?php
namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password, $role;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,teacher,student',
        ]);

        $credentials = ['email' => $this->email, 'password' => $this->password, 'role' => $this->role];

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            return match (Auth::user()->role) {
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

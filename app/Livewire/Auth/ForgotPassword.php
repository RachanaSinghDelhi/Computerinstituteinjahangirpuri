<?php
namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    public $email;

    public function sendResetLink()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        Password::sendResetLink(['email' => $this->email]);

        session()->flash('status', 'Password reset link sent to your email.');
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')->extends('layout.app');
    }
}

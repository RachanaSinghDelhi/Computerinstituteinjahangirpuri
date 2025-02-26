<?php
namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Models\User;

class ResetPassword extends Component
{
    public $email, $token, $password, $password_confirmation;

    public function mount($token)
    {
        $this->token = $token;
    }

    public function resetPassword()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function (User $user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            session()->flash('status', 'Password reset successfully.');
            return redirect()->route('login');
        } else {
            session()->flash('error', 'Failed to reset password.');
        }
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}

@extends('layout.app')

@section('title', 'Login')

@section('content')
<div class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h2><b>Login</b></h2>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="login">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" wire:model="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="input-group mb-3">
                        <input type="password" wire:model="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="input-group mb-3">
                        <select wire:model="role" class="form-control" required>
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                        </select>
                    </div>
                    @error('role') <span class="text-danger">{{ $message }}</span> @enderror

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>

                <p class="mt-3 mb-1 text-center">
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layout.app')
@section('title', 'Login')
@section('content')

<div class="container ">
    <div class="row justify-content-center">
    
            <h2 class="text-center mb-4">Login</h2>
            <form action="{{ route('login.form') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role:</label>
                    <select name="role" class="form-select" id="role" required>
                        <option value="admin">Admin</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
  
    </div>
</div>

<br><br><br>
@endsection
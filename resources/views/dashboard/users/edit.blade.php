@extends('dashboard.layout.adminlte')

@section('content')
<h2>Edit User</h2>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Users</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}" required>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role:</label>
                    <select name="role" class="form-select" id="role" required>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Teacher</option>
                        <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">New Password (leave blank to keep current):</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password:</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>
</div>
@endsection

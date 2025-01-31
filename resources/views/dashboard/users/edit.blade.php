@extends('dashboard.app')

@section('content')
<h2>Edit User</h2>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<div class="container mt-4">
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
       

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

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>

@endsection

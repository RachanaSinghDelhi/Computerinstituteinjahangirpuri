@extends('dashboard.app')

@section('content')

<div class="container">
    <h2>Create User</h2>

    @if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form action="{{ route('users.store') }}" method="POST" class="container mt-4">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" class="form-control" id="name" required>
    </div>

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

    <button type="submit" class="btn btn-primary">Create User</button>
</form>


</div>
@endsection

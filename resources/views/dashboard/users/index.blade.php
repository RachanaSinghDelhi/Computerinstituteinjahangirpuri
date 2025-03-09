@extends('dashboard.layout.adminlte')
@section('content')
<h2>Users List</h2>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<div class="container mt-4">
<div class="card">
        <div class="card-header">
            <h3 class="card-title">Users List </h3>
            <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STUDENT ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->student_id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div></div>
@endsection

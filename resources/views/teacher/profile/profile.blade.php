@extends('teacher.layout.adminlte')

@section('title', 'User Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Profile</div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table">
                        <tr>
                            <th>Name:</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $user->email ?? '' }}</td> <!-- Show after updating -->
                        </tr>
                        <tr>
                            <th>Username:</th>
                            <td>{{ $user->username }}</td>
                        </tr>
                    </table>

                    @if($user->role === 'teacher')
                    <hr>
                    <h4>Edit Profile</h4>
                    <form method="POST" action="{{ route('profile.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" placeholder="Enter new email">
                        </div>
                        
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" readonly>
                        </div>
                        
                        <hr>
                        <h4>Change Password</h4>
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Old Password</label>
                            <input type="password" name="old_password" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        
                        @if ($errors->has('password'))
                            <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                        @endif
                        
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

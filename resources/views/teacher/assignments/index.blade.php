@extends('teacher.layout.adminlte')

@section('title', 'Assignments')

@section('content')
<div class="container">
    <h2 class="mb-4">Assignments</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('teacher.assignments.add') }}" class="btn btn-primary mb-3">Add New Assignment</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Course</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignments as $assignment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $assignment->title }}</td>
                    <td>{{ $assignment->course->course_name }}</td>
                    <td>{{ date('d M Y', strtotime($assignment->due_date)) }}</td>
                    <td>
                        <span class="badge {{ $assignment->status == 'active' ? 'badge-success' : 'badge-secondary' }}">
                            {{ ucfirst($assignment->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('teacher.assignments.edit', $assignment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('teacher.assignments.delete', $assignment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('teacher.layout.adminlte')

@section('title', 'List Assignment')

@section('content')
<div class="container">
    <h2 class="mb-4">Assignments</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Course</th>
                <th>Status</th>
                <th>Student</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignments as $assignment)
                <tr>
                    <td>{{ $assignment->id }}</td>
                    <td>{{ $assignment->title }}</td>
                    <td>{{ $assignment->description }}</td>
                    <td>{{ $assignment->deadline }}</td>
                    <td>{{ $assignment->course->course_name ?? 'N/A' }}</td>
                    <td>{{ ucfirst($assignment->status) }}</td>
                    <td>
            @foreach ($assignment->students as $student)
                {{ $student->name }} ({{ $student->student_id }})<br>
            @endforeach
        </td>
              

                    <td>
                        <a href="{{ route('teacher.assignments.edit', $assignment->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

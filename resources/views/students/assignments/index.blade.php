@extends('students.layout.adminlte')
@section('title', 'Assignments')

@section('content')
<div class="container">
    <h2>Assignments</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignments as $assignment)
                <tr>
                    <td>{{ $assignment->title }}</td>
                    <td>{{ $assignment->description }}</td>
                    <td>{{ \Carbon\Carbon::parse($assignment->deadline)->diffForHumans() }}</td>

                    <td>
                        <a href="{{ route('student.assignments.create', $assignment->id) }}" class="btn btn-primary">Submit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

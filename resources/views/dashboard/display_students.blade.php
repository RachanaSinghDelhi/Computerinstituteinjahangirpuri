@extends('dashboard.app')
@section('title', 'Students List')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Student List</h2>

    <!-- Table for displaying students -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Father's Name</th>
                <th>Date of Admission</th>
                <th>Course</th>
                <th>Batch</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->father_name }}</td>
                <td>{{ $student->doa }}</td> <!-- Format the date if necessary -->
                <td>{{ $student->course->course_title ?? 'N/A' }}</td> <!-- Display course name, or 'N/A' if no course -->
                <td>{{ $student->batch }}</td>
                <td>
                    @if($student->photo)
                        <img src="{{ asset('storage/' . $student->photo) }}" alt="Student Photo" width="50">
                    @else
                        No Photo
                    @endif
                </td>
                <td>
                    <!-- Action buttons for view/edit/delete (you can implement these actions) -->
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $students->links() }}
</div>
@endsection
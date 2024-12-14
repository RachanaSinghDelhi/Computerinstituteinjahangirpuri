@extends('dashboard.app')

@section('content')
<div class="container">
    <h2>Certificates List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Father's Name</th>
                <th>DOA</th>
                <th>Batch</th>
                <th>Photo</th>
                <th>Contact Number</th>
                <th>Course Title</th>
                <th>Duration (Months)</th>
                <th>Course Description</th>
                <th>Course Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($certificates as $certificate)
            <tr>
                <td>{{ $certificate->student_id }}</td>
                <td>{{ $certificate->name }}</td>
                <td>{{ $certificate->father_name }}</td>
                <td>{{ $certificate->doa }}</td>
                <td>{{ $certificate->batch }}</td>
                <td>
                    <img src="{{ asset('storage/' . $certificate->photo) }}" alt="Photo" width="50">
                </td>
                <td>{{ $certificate->contact_number }}</td>
                <td>{{ $certificate->course_title }}</td>
                <td>{{ $certificate->duration }}</td>
                <td>{{ $certificate->course_desc }}</td>
                <td>
                    <img src="{{ asset('storage/' . $certificate->course_image) }}" alt="Course Image" width="50">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
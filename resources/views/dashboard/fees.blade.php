@extends('dashboard.app')
@section('title', 'Fees')
@section('content')
<h1>Fees Management</h1>
<table class="table">
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Admission Date</th>
            <th>Course</th>
            <th>Total Fee</th>
            <th>Fees Paid</th>
            <th>Fees Due</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->doa}}</td>
            <td>{{ $student->course->course_title }}</td>
            <td>{{ $student->course->total_fees }}</td>
            <td>{{ $student->fees->sum('amount_paid') }}</td>
            <td>{{ $student->course->total_fees - $student->fees->sum('amount_paid') }}</td>
            <td>
                <a href="{{ route('fees.show', $student->id) }}" class="btn btn-info">Details</a>
                <a href="{{ route('fees.create', $student->id) }}" class="btn btn-primary">Pay Fee</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

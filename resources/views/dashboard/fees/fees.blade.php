@extends('dashboard.app')

@section('content')

<div class="container">
    <h1>Student Fees Status</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
            <th>Student ID</th>
                <th>Student Name</th>
                <th>Course Title</th>
                <th>Total Fees</th>
                <th>Installments</th>
                <th>Fees Paid</th>
                <th>Fees Due</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feesData as $fee)
                <tr>
                    <td>{{ $fee->student_id }}</td>
                    <td>{{ $fee->student_name }}</td>
                    <td>{{ $fee->course_title }}</td>
                    <td>{{ $fee->total_fees }}</td>
                    <td>{{ $fee->installments }}</td>
                    <td>{{ $fee->fees_paid }}</td>
                    <td>{{ $fee->fees_due }}</td>
                    <td>
                    <span class="badge 
    @if($fee->status == 'Paid') 
        bg-success 
    @elseif($fee->status == 'Paid but Pending Next Month') 
        bg-warning 
    @else 
        bg-danger 
    @endif
">
    {{ $fee->status }}
</span>

                    </td>
                    <td>
                <!-- Pay Now Button -->
                <a href="{{ route('add_fees', $fee->student_id) }}" class="btn btn-primary">Pay Now</a>
                
            </td>
            <td><a href="{{ route('fees.show', $fee->student_id) }}" class="btn btn-info">View Details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

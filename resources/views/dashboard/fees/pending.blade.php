@extends('dashboard.app')

@section('content')
<div class="container mt-4">
    <h2>Pending Fees</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Pending Amount</th>
                <th>Due Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fees as $fee)
                <tr>
                    <td>{{ $fee->student_name }}</td>
                    <td>₹{{ number_format($fee->fees_due, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($fee->due_date)->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

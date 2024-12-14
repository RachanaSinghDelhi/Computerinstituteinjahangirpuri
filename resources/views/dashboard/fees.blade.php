@extends('dashboard.app')
@section('title', 'Add Course')
@section('content')

<h1>Fees List</h1>

<table>
    <thead>
        <tr>
            <th>Receipt Number</th>
            <th>Student</th>
            <th>Amount</th>
            <th>Payment Date</th>
            <th>Due Date</th>
            <th>Receipt</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($fees as $fee)
        <tr>
            <td>{{ $fee->receipt_number }}</td>
            <td>{{ $fee->student->name }}</td>
            <td>{{ $fee->amount }}</td>
            <td>{{ $fee->payment_date }}</td>
            <td>{{ $fee->due_date }}</td>
            <td>
                @if ($fee->receipt_image)
                <a href="{{ asset('storage/' . $fee->receipt_image) }}" target="_blank">View Receipt</a>
                @else
                No Receipt
                @endif
            </td>
            <td>{{ $fee->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
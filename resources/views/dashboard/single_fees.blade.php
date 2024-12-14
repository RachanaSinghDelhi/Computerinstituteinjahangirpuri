@extends('dashboard.app')
@section('title', 'Single Fees')
@section('content')
<h1>Fee Details for {{ $student->name }}</h1>
<p>Course: {{ $student->course->name }}</p>
<p>Total Fee: {{ $student->course->total_fee }}</p>
<p>Fees Paid: {{ $fees->sum('amount_paid') }}</p>
<p>Fees Due: {{ $student->course->total_fee - $fees->sum('amount_paid') }}</p>

<h2>Payment History</h2>
<table class="table">
    <thead>
        <tr>
            <th>Amount Paid</th>
            <th>Payment Date</th>
            <th>Receipt Number</th>
            <th>Receipt</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fees as $fee)
        <tr>
            <td>{{ $fee->amount_paid }}</td>
            <td>{{ $fee->payment_date }}</td>
            <td>{{ $fee->receipt_number }}</td>
            <td><img src="{{ asset('assets/receipts/' . $fee->receipt_image) }}" alt="Receipt" width="100"></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

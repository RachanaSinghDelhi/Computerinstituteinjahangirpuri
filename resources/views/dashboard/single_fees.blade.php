@extends('dashboard.app')
@section('title', 'Single Fees')
@section('content')
<div class="container">
    <h3>Fee Details for {{ $student->name }}</h3>
    <p><strong>Course:</strong> {{ $student->course->name }}</p>
    <p><strong>Total Fees:</strong> ₹{{ $student->course->total_fees }}</p>
    <p><strong>Installment Amount:</strong> ₹{{ $installmentAmount }}</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Payment Date</th>
                <th>Admission Date</th>
                <th>Amount Paid</th>
                <th>Due Date</th>
                <th>Fees Due</th>
                <th>Status</th>
                <th>Receipt</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fees as $fee)
                <tr>
                    <td>{{ $fee->payment_date }}</td>
                    <td>{{ $student->doa}}</td>
                    <td>₹{{ $fee->amount_paid }}</td>
                    <td>{{ $fee->due_date ? $fee->due_date->format('Y-m-d') : 'N/A' }}</td>
                    <td>₹{{ $fee->fees_due }}</td>
                    <td>{{ $fee->fee_status }}</td>
                    <td>
                        @if ($fee->receipt_image)
                            <a href="{{ asset('assets/receipts/' . $fee->receipt_image) }}" target="_blank">View Receipt</a>
                        @else
                            No Receipt
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
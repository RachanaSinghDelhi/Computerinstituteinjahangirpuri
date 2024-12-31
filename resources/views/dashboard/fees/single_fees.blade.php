@extends('dashboard.app')
@section('title', 'Single Fees')
@section('content')
<div class="container">
    <h3>Fee Details for {{ $student->name }}</h3>
    <h3>Fee Details for {{ $student->student_id }}</h3>
    <p><strong>Course:</strong> {{ $student->course->name }}</p>
    <p><strong>Total Fees:</strong> ₹{{ $student->course->total_fees }}</p>
    <p><strong>Installment Amount:</strong> ₹ {{$defaultInstallmentAmount}}</p>
    <p><strong>Total Installments:</strong> {{ $fees->count() }}</p> <!-- Total Installments -->
    <p><strong>Total Fees Paid:</strong> ₹{{ $fees->sum('amount_paid') }}</p> <!-- Total Fees Paid -->

    <!-- Responsive Table -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Payment Date</th>
                    <th>Admission Date</th>
                    <th>Amount Paid</th>
                    <th>Due Date</th>
                    <th>Fees Due</th>
                    <th>Status</th>
                    <th>Receipt number</th>
                    <th>Receipt</th>
                    <th>Actions</th> <!-- Added this column -->
                </tr>
            </thead>
            <tbody>
                @foreach ($fees as $fee)
                    <tr>
                        <td>{{ $fee->payment_date ? $fee->payment_date->format('Y-m-d') : 'N/A' }}</td>
                        <td>{{ $student->doa }}</td>
                        <td>₹{{ $fee->amount_paid }}</td>
                        <td>{{ $fee->due_date ? $fee->due_date->format('Y-m-d') : 'N/A' }}</td>
                        <td>₹{{ $fee->fees_due }}</td>
                        <td>{{ $fee->status }}</td>
                        <td>{{ $fee->receipt_number }}</td>
                        <td>
                            @if ($fee->receipt_image)
                                <a href="{{ asset('/receipts/' . $fee->receipt_image) }}" target="_blank">View Receipt</a>
                            @else
                                No Receipt
                            @endif
                        </td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('fees.edit', $fee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            
                            <!-- Delete Form -->
                            <form action="{{ route('fees.destroy', $fee->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

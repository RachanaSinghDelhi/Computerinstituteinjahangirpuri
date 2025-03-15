@extends('teacher.layout.adminlte')
@section('title', 'Fee Detail')

@section('content')
@php
    use Carbon\Carbon;
@endphp

<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Fees Details for {{ $student->name }} ({{ $student->student_id }})</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Installment No</th>
                            <th>Payment Date</th>
                            <th>Due Date</th>
                            <th>Amount Paid</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <th>Receipt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fees as $fee)
                            <tr>
                                <td>{{ $fee->installment_no }}</td>
                                <td>{{ $fee->payment_date ? Carbon::parse($fee->payment_date)->format('d M Y') : 'N/A' }}</td>
                                <td>{{ $fee->due_date ? Carbon::parse($fee->due_date)->format('d M Y') : 'N/A' }}</td>
                                <td>₹{{ number_format($fee->amount_paid, 2) }}</td>
                                <td>₹{{ number_format($fee->balances, 2) }}</td>
                                <td>
                                    @if($fee->status == 'Paid')
                                        <span class="badge bg-success">Paid</span>
                                    @elseif($fee->status == 'Pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @else
                                        <span class="badge bg-danger">Overdue</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $fee->receipt_number ?? 'N/A' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
</div>

@endsection

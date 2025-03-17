@extends('students.layout.adminlte')
@section('title', 'Payment Details')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Payment History & Fees Details</h2>

    <div class="card p-3 mb-3">
        <h5>Fees Summary</h5>
        <p><strong>Total Paid:</strong> ₹{{ number_format($totalPaid) }}</p>
        <p><strong>Balance Due:</strong> ₹{{ number_format($totalBalance) }}</p>
    </div>

    <div class="card p-3">
        <h5>Payment History</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Installment No</th>
                    <th>Payment Date</th>
                    <th>Amount Paid</th>
                    <th>Balance</th>
                    <th>Receipt</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->installment_no }}</td>
                    <td>{{ date('d M Y', strtotime($payment->payment_date)) }}</td>
                    <td>₹{{ number_format($payment->amount_paid) }}</td>
                    <td>₹{{ number_format($payment->balances) }}</td>
                    <td>
                        @if($payment->receipt_image)
                            <a href="{{ asset('uploads/receipts/' . $payment->receipt_image) }}" target="_blank">View</a>
                        @else
                            No Receipt
                        @endif
                    </td>
                    <td>
                        <span class="badge {{ $payment->status == 'Paid' ? 'bg-success' : 'bg-danger' }}">
                            {{ $payment->status }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

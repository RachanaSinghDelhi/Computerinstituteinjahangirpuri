@extends('students.layout.adminlte')
@section('title', 'Payment Details')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Pay Your Pending Fees</h2>

    <!-- Display Success and Error Messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Fetch latest payment status -->
    @php
        $latestPayment = \App\Models\Payment::where('student_id', auth()->user()->student_id)
                                            ->latest()
                                            ->first();
    @endphp

    <!-- Show Pending Approval Message -->
    @if($latestPayment && $latestPayment->status == 'pending')
        <div class="alert alert-warning text-center">
            Your payment of <strong>₹{{ $latestPayment->amount }}</strong> is pending approval by the admin.
        </div>
    @endif

    <!-- UPI Payment -->
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Pay via UPI</h5>
            <p>Send payment to: <strong>9312945741-2@ybl</strong></p>
            <form method="POST" action="{{ route('student.store.payment') }}">
                @csrf
                <input type="hidden" name="method" value="upi">
                <input type="text" name="transaction_id" class="form-control" placeholder="Enter UPI Transaction ID" required>
                <input type="number" name="amount" class="form-control mt-2" placeholder="Enter Amount" required>
                <button type="submit" class="btn btn-primary mt-2 w-100">Confirm Payment</button>
            </form>
        </div>
    </div>

    <!-- QR Code Payment -->
    <div class="card mt-4">
        <div class="card-body text-center">
            <h5 class="card-title">Scan QR Code</h5>
            <img src="{{ asset('assets/images/qrcode.jpg') }}" alt="QR Code" class="img-fluid" width="200">
            <p class="mt-2">Scan the QR code to pay.</p>
            <form method="POST" action="{{ route('student.store.payment') }}">
                @csrf
                <input type="hidden" name="method" value="qr">
                <input type="text" name="transaction_id" class="form-control" placeholder="Enter Transaction ID" required>
                <input type="number" name="amount" class="form-control mt-2" placeholder="Enter Amount" required>
                <button type="submit" class="btn btn-success mt-2 w-100">Confirm Payment</button>
            </form>
        </div>
    </div>

    <!-- Bank Transfer Payment -->
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Bank Transfer</h5>
            <p><strong>Bank Name:</strong> NICE WEB TECHNOLOGIES</p>
            <p><strong>Account No:</strong> 921020053007175</p>
            <p><strong>IFSC Code:</strong> UTIB0004440</p>
            <form method="POST" action="{{ route('student.store.payment') }}">
                @csrf
                <input type="hidden" name="method" value="bank">
                <input type="text" name="transaction_id" class="form-control" placeholder="Enter Bank Transaction ID" required>
                <input type="number" name="amount" class="form-control mt-2" placeholder="Enter Amount" required>
                <button type="submit" class="btn btn-info mt-2 w-100">Confirm Payment</button>
            </form>
        </div>
    </div>
</div>
@endsection

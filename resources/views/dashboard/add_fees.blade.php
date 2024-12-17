@extends('dashboard.app')
@section('title', 'Add Fees')
@section('content')
<h1>Pay Fees for {{ $student->name }}</h1>
<form action="{{ route('dashboard.store_fees', $student->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="receipt_number">Receipt Number (Optional)</label>
        <input type="number" name="receipt_number" id="receipt_number" class="form-control" value="{{ old('receipt_number', $lastReceiptNumber ?? $receiptNumber) }}" placeholder="Enter Receipt Number (Leave empty for auto-generated)">
    </div>

    <div class="form-group">
        <label for="amount_paid">Amount to Pay (Monthly Installment)</label>
        <input type="number" name="amount_paid" id="amount_paid" class="form-control" value="{{ old('amount_paid', $defaultInstallmentAmount) }}" required>
    </div>

    <div class="form-group">
        <label for="payment_date">Payment Date</label>
        <input type="date" name="payment_date" id="payment_date" class="form-control" value="{{ old('payment_date', now()->format('Y-m-d')) }}" required>
    </div>

    <button type="submit" class="btn btn-success">Submit Payment</button>
</form>


@endsection

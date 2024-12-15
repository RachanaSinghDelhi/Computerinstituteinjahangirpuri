@extends('dashboard.app')
@section('title', 'Add Fees')
@section('content')
<h1>Pay Fees for {{ $student->name }}</h1>
<form action="{{ route('fees.store', $student->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="amount_paid">Amount to Pay (Monthly Installment)</label>
        <input 
            type="number" 
            name="amount_paid" 
            id="amount_paid" 
            class="form-control" 
            value="{{ $installmentAmount }}" 
             
            required>
    </div>
    <div class="form-group">
        <label for="payment_date">Payment Date</label>
        <input 
            type="date" 
            class="form-control" 
            id="payment_date" 
            name="payment_date" 
            value="{{ old('payment_date', now()->format('Y-m-d')) }}" 
            required>
    </div>
    <div class="form-group">
        <label for="receipt_image">Upload Receipt</label>
        <input 
            type="file" 
            name="receipt_image" 
            id="receipt_image" 
            class="form-control" 
            required>
    </div>
    <button type="submit" class="btn btn-success">Submit Payment</button>
</form>

@endsection

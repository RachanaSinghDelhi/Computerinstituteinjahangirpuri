@extends('dashboard.app')
@section('title', 'Edit Fees')
@section('content')

<h1>Edit Fees</h1>

<!-- Display Success or Error Messages -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- Edit Fees Form -->
<form action="{{ route('fees.update', $fee->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Required for PUT requests -->

    <!-- Receipt Number -->
    <div class="form-group">
        <label for="receipt_number">Receipt Number</label>
        <input type="text" id="receipt_number" name="receipt_number" 
               value="{{ old('receipt_number', $fee->receipt_number) }}" 
               class="form-control" required>
    </div>

    <!-- Amount Paid -->
    <div class="form-group">
        <label for="amount_paid">Amount Paid</label>
        <input type="number" id="amount_paid" name="amount_paid" 
               value="{{ old('amount_paid', $fee->amount_paid) }}" 
               class="form-control" required>
    </div>

    <!-- Receipt Image -->
    <div class="form-group">
        <label for="receipt_image">Receipt Image</label>
        <input type="text" id="receipt_image" name="receipt_image" 
               value="{{ old('receipt_image', $fee->receipt_image) }}" 
               class="form-control" required>
    </div>

    <!-- Payment Date -->
    <div class="form-group">
        <label for="payment_date">Payment Date</label>
        <input type="date" id="payment_date" name="payment_date" 
               value="{{ old('payment_date', $fee->payment_date ? \Carbon\Carbon::parse($fee->payment_date)->format('Y-m-d') : '') }}" 
               class="form-control" required>
    </div>

    <!-- Due Date -->
    <div class="form-group">
        <label for="due_date">Due Date</label>
        <input type="date" id="due_date" name="due_date" 
               value="{{ old('due_date', $fee->due_date ? \Carbon\Carbon::parse($fee->due_date)->format('Y-m-d') : '') }}" 
               class="form-control">
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update Fee</button>
</form>

@endsection

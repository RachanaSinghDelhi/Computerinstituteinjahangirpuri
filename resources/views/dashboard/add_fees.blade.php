@extends('dashboard.app')
@section('title', 'Add Fees')
@section('content')
<h1>Pay Fees for {{ $student->name }}</h1>
<form action="{{ route('fees.store', $student->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="amount_paid">Amount to Pay</label>
        <input type="number" name="amount_paid" id="amount_paid" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="receipt_image">Upload Receipt</label>
        <input type="file" name="receipt_image" id="receipt_image" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Submit Payment</button>
</form>
@endsection

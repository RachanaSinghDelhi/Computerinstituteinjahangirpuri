@extends('admin.layout.adminlte')
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

<div class="container mt-5">
    <div class="card shadow">
    <div class="card-header bg-primary text-white">
            <h3 class="card-title">Edit Fees</h3>
        </div>
        <div class="card-body">
       
            
            <form action="{{ route('admin.fees.update', $fee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="installment_no" class="form-label">Installment No</label>
                    <input type="number" class="form-control" id="installment_no" name="installment_no" 
                           value="{{ old('installment_no', $fee->installment_no) }}" required>
                </div>

                <div class="mb-3">
                    <label for="amount_paid" class="form-label">Amount Paid</label>
                    <input type="number" class="form-control" id="amount_paid" name="amount_paid" 
                           value="{{ old('amount_paid', $fee->amount_paid) }}" required>
                </div>
                <div class="mb-3">
                    <label for="blanaces" class="form-label">Balances</label>
                    <input type="number" class="form-control" id="Balance" name="Balance" 
                           value="{{ old('balances', $fee->Balances) }}" required>
                </div>

                <div class="mb-3">
                    <label for="payment_date" class="form-label">Payment Date</label>
                    <input type="date" class="form-control" id="payment_date" name="payment_date" 
                           value="{{ old('payment_date', $fee->payment_date->format('Y-m-d')) }}">
                </div>

                <div class="mb-3">
                    <label for="receipt_number" class="form-label">Receipt Number</label>
                    <input type="text" class="form-control" id="receipt_number" name="receipt_number" 
                           value="{{ old('receipt_number', $fee->receipt_number) }}" required>
                </div>

                <div class="mb-3">
                    <label for="receipt_image" class="form-label">Receipt Image</label>
                    <input type="file" class="form-control" id="receipt_image" name="receipt_image">
                    @if($fee->receipt_image)
                        <div class="mt-2">
                            <small>Current: {{ $fee->receipt_image }}</small>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="Paid" {{ $fee->status === 'Paid' ? 'selected' : '' }}>Paid</option>
                        <option value="Unpaid" {{ $fee->status === 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update Fee
                </button>
                <a href="{{ route('fees.show', $fee->student_id) }}" class="btn btn-secondary">
                 Fees Detail
                </a>
            </form>
        </div>
    </div>
</div>

@endsection

@extends('dashboard.layout.adminlte')

@section('title', 'Edit Expense')

@section('content_header')
    <h1>Edit Expense</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Update Expense</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('superadmin.expenses.update', $expense->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="exp_name">Expense Name</label>
                <input type="text" name="exp_name" id="exp_name" class="form-control" value="{{ old('exp_name', $expense->exp_name) }}" required>
                @error('exp_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="expense_type">Expense Type</label>
                <input type="text" name="expense_type" id="expense_type" class="form-control" value="{{ old('expense_type', $expense->expense_type) }}" required>
                @error('expense_type')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="amount">Amount (₹)</label>
                <input type="number" name="amount" id="amount" class="form-control" step="0.01" value="{{ old('amount', $expense->amount) }}" required>
                @error('amount')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $expense->description) }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="expense_date">Expense Date</label>
                <input type="date" name="expense_date" id="expense_date" class="form-control" value="{{ old('expense_date', $expense->expense_date) }}" required>
                @error('expense_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update Expense</button>
            <a href="{{ route('superadmin.expenses.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@stop

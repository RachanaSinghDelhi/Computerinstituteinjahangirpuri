@extends('adminlte::page')

@section('title', 'Add New Expense')

@section('content_header')
    <h1>Add New Expense</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Expense Details</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.expenses.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="exp_name">Expense Name</label>
                <input type="text" name="exp_name" id="exp_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="expense_type">Expense Type</label>
                <select name="expense_type" id="expense_type" class="form-control" required>
                    <option value="Salary">Salary</option>
                    <option value="Wages">Wages</option>
                    <option value="Electricity">Electricity</option>
                    <option value="ID Cards">ID Cards</option>
                    <option value="Office Rent">Office Rent</option>
                    <option value="Loans">Loans</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" step="0.01" name="amount" id="amount" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="expense_date">Expense Date</label>
                <input type="date" name="expense_date" id="expense_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description (Optional)</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Save Expense</button>
                <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </form>
    </div>
</div>
@stop

@extends('dashboard.app')
@section('title', 'Add Fees')

@section('content')
<div class="container">
    <h2>Pay Fees for {{ $student->name }}</h2>

    {{-- Display success or error messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('save_student_fee') }}" method="POST">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->student_id }}">
        <input type="hidden" name="course_id" value="{{ $course->courses_id }}">

        <div class="mb-3">
            <label for="amount_paid" class="form-label">Amount Paid</label>
            <input type="number" class="form-control" id="amount_paid" name="amount_paid" required>
        </div>

        <div class="mb-3">
            <label for="payment_date" class="form-label">Payment Date</label>
            <input type="date" class="form-control" id="payment_date" name="payment_date" required>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" readonly>
        </div>

        <div class="mb-3">
            <label for="receipt_number" class="form-label">Receipt Number (Optional)</label>
            <input type="text" class="form-control" id="receipt_number" name="receipt_number">
        </div>

        <button type="submit" class="btn btn-primary">Submit Payment</button>
    </form>
</div>

<script>
    document.getElementById('payment_date').addEventListener('change', function () {
        const paymentDate = new Date(this.value);
        if (!isNaN(paymentDate)) {
            const dueDate = new Date(paymentDate);
            dueDate.setMonth(dueDate.getMonth() + 1);
            const formattedDueDate = dueDate.toISOString().split('T')[0];
            document.getElementById('due_date').value = formattedDueDate;
        }
    });
</script>
@endsection

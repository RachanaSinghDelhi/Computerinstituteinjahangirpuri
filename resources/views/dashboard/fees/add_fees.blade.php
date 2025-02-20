@extends('dashboard.app')
@section('title', 'Add Fees')

@section('content')
<div class="container">
    <h2>Pay Fees for {{ $student->name }}</h2>
    <h4>Course: {{ $course->title }}</h4>

    {{-- Display success or error messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('save_fee') }}" method="POST">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->student_id }}">
        <input type="hidden" name="course_id" value="{{ $course->id }}">
        <input type="hidden" id="course_fee" value="{{ $studentFeesStatus->total_fees }}">
        <input type="hidden" id="installments" value="{{ $course->installments }}">
        <input type="hidden" id="course_type" value="{{ $course->course_title}}">

        {{-- Admission Date --}}
        <div class="mb-3">
            <label for="admission_date" class="form-label">Admission Date</label>
            <input type="date" class="form-control" id="admission_date" name="admission_date" value="{{ $student->doa}}" readonly>
        </div>

        <div class="mb-3">
            <label for="amount_paid" class="form-label">Amount Paid</label>
            <input type="number" class="form-control" id="amount_paid" name="amount_paid" required>
        </div>

        <div class="mb-3">
            <label for="installment_type" class="form-label">Installment Type</label>
            <select id="installment_type" name="installment_type" class="form-control">
                <option value="first">First Installment</option>
                <option value="last">Last Installment</option>
                <option value="regular" selected>Regular Installment</option>
            </select>
        </div>
        <div class="mb-3">
    <label for="installment_no" class="form-label">Installment Number</label>
    <input type="text" class="form-control" id="installment_no" name="installment_no" value="{{ old('installment_no', $nextInstallmentNo) }}" required>
</div>

<div class="mb-3">
            <label for="payment_date" class="form-label">Payment Date</label>
            <input type="date" class="form-control" id="payment_date" name="payment_date" required>
        </div>

        {{-- Due Date --}}
        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" readonly>
        </div>

        <div class="mb-3">
    <label for="receipt_number" class="form-label">Receipt Number</label>
    <input type="number" class="form-control" id="receipt_number" name="receipt_number" value="{{ $nextReceiptNumber }}" required>
</div>

        <button type="submit" class="btn btn-primary">Submit Payment</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const courseFee = parseFloat(document.getElementById('course_fee').value);
        const installments = parseInt(document.getElementById('installments').value);
        const courseType = document.getElementById('course_type').value; // Get course type (basic or other)

        if (!isNaN(courseFee) && !isNaN(installments) && installments > 0) {
            const admissionCharges = 100;
            const certificationCharges = courseType === 'BASIC' ? 0 : 250;
            const totalCharges = courseFee - admissionCharges - certificationCharges;

            const regularInstallment = (totalCharges / installments).toFixed(2);

            // Adjust the amount for first, last, and regular installments
            document.getElementById('installment_type').addEventListener('change', function () {
                let amountPaid;

                if (this.value === 'first') {
                    amountPaid = parseFloat(regularInstallment) + admissionCharges;
                } else if (this.value === 'last') {
                    amountPaid = parseFloat(regularInstallment) + certificationCharges;
                } else {
                    amountPaid = regularInstallment;
                }

                document.getElementById('amount_paid').value = parseFloat(amountPaid).toFixed(2);
            });

            // Set default to regular installment on page load
            document.getElementById('installment_type').dispatchEvent(new Event('change'));
        }

     
    });


    document.addEventListener('DOMContentLoaded', function () {
        const receiptInput = document.getElementById('receipt_number');

        let lastReceiptValue = parseInt(receiptInput.value);

        receiptInput.addEventListener('input', function () {
            lastReceiptValue = parseInt(this.value) || lastReceiptValue;
        });

        document.querySelector('form').addEventListener('submit', function () {
            // Ensure the current receipt number is used
            receiptInput.value = lastReceiptValue;
        });
    });





    document.addEventListener('DOMContentLoaded', function () {
        const admissionDateInput = document.getElementById('admission_date');
        const paymentDateInput = document.getElementById('payment_date');
        const dueDateInput = document.getElementById('due_date');

        if (admissionDateInput && paymentDateInput && dueDateInput) {
            const admissionDate = new Date(admissionDateInput.value);

            paymentDateInput.addEventListener('change', function () {
                if (this.value) {
                    let paymentDate = new Date(this.value);
                    let dueDay = admissionDate.getDate(); // Keep the same day
                    let dueMonth = paymentDate.getMonth() + 1; // Move to next month
                    let dueYear = paymentDate.getFullYear();

                    if (dueMonth > 11) { 
                        dueMonth = 0; // If December, move to January
                        dueYear += 1;
                    }

                    // Create a new due date with the correct year, month, and same admission day
                    let dueDate = new Date(dueYear, dueMonth, dueDay);

                    // If the due date exceeds the number of days in the month, adjust it to the last valid date
                    if (dueDate.getDate() !== dueDay) {
                        dueDate.setDate(0); // This sets it to the last day of the previous month (valid max date)
                    }

                    dueDateInput.value = dueDate.toISOString().split('T')[0];
                }
            });

            // Auto-trigger change if payment date is already set
            if (paymentDateInput.value) {
                paymentDateInput.dispatchEvent(new Event('change'));
            }
        }
    });
</script>
@endsection

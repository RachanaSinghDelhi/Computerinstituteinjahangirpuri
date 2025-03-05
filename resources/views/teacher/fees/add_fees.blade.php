@extends('teacher.layout.adminlte')

@section('title', 'Add Fees')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Pay Fees for {{ $student->name }}</h3>
        </div>
        <div class="card-body">
       

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('teacher.fees.store') }}" method="POST">
                @csrf
                <input type="hidden" name="student_id" value="{{ $student->student_id }}">
                <input type="hidden" name="course_id" value="{{ $course->id }}">
               
                <input type="hidden" id="installments" value="{{ $course->installments }}">
                <input type="hidden" id="course_type" value="{{ $course->course_name }}">

                <div class="form-group">
                    <label for="admission_date">Admission Date</label>
                    <input type="date" class="form-control" id="admission_date" name="admission_date" value="{{ $student->doa }}" readonly>
                </div>

                <div class="form-group">
                    <label for="amount_paid">Amount Paid</label>
                    <input type="number" class="form-control" id="amount_paid" name="amount_paid" required>
                </div>
                <div class="form-group">
                    <label for="Balance">Balance</label>
                    <input type="number" class="form-control" id="balances" name="balances">
                </div>

                <div class="form-group">
                    <label for="installment_type">Installment Type</label>
                    <select id="installment_type" name="installment_type" class="form-control">
                        <option value="first">First Installment</option>
                        <option value="last">Last Installment</option>
                        <option value="regular" selected>Regular Installment</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="installment_no">Installment Number</label>
                    <input type="text" class="form-control" id="installment_no" name="installment_no" value="{{ old('installment_no', $nextInstallmentNo) }}" required>
                </div>

                <div class="form-group">
                    <label for="payment_date">Payment Date</label>
                    <input type="date" class="form-control" id="payment_date" name="payment_date" required>
                </div>

                <div class="form-group">
                    <label for="due_date">Due Date</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" readonly>
                </div>

                <div class="form-group">
                    <label for="receipt_number">Receipt Number</label>
                    <input type="number" class="form-control" id="receipt_number" name="receipt_number" value="{{ $nextReceiptNumber }}" readonly >
                </div>

                <button type="submit" class="btn btn-success">Submit Payment</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const courseFee = parseFloat(document.getElementById('course_fee').value);
        const installments = parseInt(document.getElementById('installments').value);
        const courseType = document.getElementById('course_type').value;
        
        if (!isNaN(courseFee) && !isNaN(installments) && installments > 0) {
            const admissionCharges = 100;
            const certificationCharges = courseType === 'BASIC' ? 0 : 250;
            const totalCharges = courseFee - admissionCharges - certificationCharges;
            const regularInstallment = (totalCharges / installments).toFixed(2);

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
            
            document.getElementById('installment_type').dispatchEvent(new Event('change'));
        }

        document.getElementById('payment_date').addEventListener('change', function () {
            const admissionDate = new Date(document.getElementById('admission_date').value);
            let paymentDate = new Date(this.value);
            let dueDate = new Date(paymentDate);
            dueDate.setMonth(paymentDate.getMonth() + 1);
            
            if (dueDate.getDate() !== admissionDate.getDate()) {
                dueDate.setDate(0);
            }

            document.getElementById('due_date').value = dueDate.toISOString().split('T')[0];
        });
    });
</script>
@endsection

@extends('dashboard.app')
@section('title', 'Fees')
@section('content')
<h1>Fees Management</h1>

<!-- Search Bar -->
<div class="mb-3">
    <input type="text" id="search" class="form-control" placeholder="Search by student name...">
</div>

<!-- Fees Table -->
<table class="table">
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Student ID</th>
            <th>Admission Date</th>
            <th>Course</th>
            <th>Total Fee</th>
            <th>Fees Paid</th>
            <th>Fees Due</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="studentTableBody">
        @foreach($students as $student)
        @php
            // Calculate the installment amount (total fee divided by number of installments)
            $installmentAmount = round($student->course->total_fees / $student->course->installments); // Round to nearest whole number

            // Get the payment for the current month
            $paymentThisMonth = $student->fees()
                ->whereMonth('created_at', now()->month) // Payments made this month
                ->sum('amount_paid');

            // Check if the student has paid the current month's installment
            $isPaidThisMonth = ($paymentThisMonth >= $installmentAmount);

            // Calculate the total amount paid so far
            $totalPaid = $student->fees->sum('amount_paid');

            // Check if the total fee has been fully paid
            $isFullyPaid = ($totalPaid >= $student->course->total_fees);

            // Set status as "Paid" if the full fee is paid
            $statusClass = $isPaidThisMonth ? 'bg-success' : 'bg-danger'; // Green for paid, red for pending
            $statusText = $isPaidThisMonth ? 'Paid' : 'Pending'; // Text showing paid or pending

            // If the fee is completely paid, mark as "Paid"
            if ($isFullyPaid) {
                $statusClass = 'bg-success';
                $statusText = 'Paid';
            }
        @endphp
        <tr id="student-{{ $student->id }}">
            <td>{{ $student->name }}</td>
            <td>{{ $student->student_id }}</td>
            <td>{{ $student->doa }}</td>
            <td>{{ $student->course->course_title }}</td>
            <td>{{ $student->course->total_fees }}</td>
            <td>{{ $totalPaid }}</td>
            <td>{{ $student->course->total_fees - $totalPaid }}</td>
            <td class="{{ $statusClass }}">
                {{ $statusText }}
            </td>
            <td>
                <a href="{{ route('dashboard.single_fees', $student->id) }}" class="btn btn-info">Details</a>
                <a href="{{ route('dashboard.add_fees', $student->id) }}" class="btn btn-primary">Pay Fee</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination -->
{{ $students->links() }}

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // AJAX search functionality
    $('#search').on('keyup', function() {
        let query = $(this).val();

        $.ajax({
            url: "{{ route('search.fees') }}",
            method: "GET",
            data: { query: query },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#studentTableBody').html(response);  // Update the table body with the new results
            }
        });
    });
</script>
@endpush

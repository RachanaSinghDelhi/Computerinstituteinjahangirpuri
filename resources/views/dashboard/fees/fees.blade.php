@extends('dashboard.app')
@section('title', 'Fees')
@section('content')
<div class="container">
<h1>Fees Management</h1>
<div class="container mt-5">
        <h1>Upload Receipts</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            <ul>
                @foreach(session('files') as $file)
                    <li>{{ $file }}</li>
                @endforeach
            </ul>
        @endif
<div class="row">
    
        <form action="{{ route('upload.receipts') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 col-mg-6">
                <label for="receipt_images" class="form-label">Select Receipt Images</label>
                <input type="file" name="receipt_images[]" id="receipt_images" class="form-control" multiple>
            </div>
            <div class="mb-3 col-md-6">
            <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
</div>
    </div>
<a href="{{ route('student.fees.sync') }}" class="btn btn-primary">
    Sync Student Fees
</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<!-- Search Bar -->
<div class="mb-3">
    <input type="text" id="search" class="form-control" placeholder="Search by student name...">
</div>

<!-- Fees Table -->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Student ID</th>
                <th class="d-none d-md-table-cell">Admission Date</th> <!-- Hidden on small screens -->
                <th class="d-none d-md-table-cell">Course</th> <!-- Hidden on small screens -->
                <th class="d-none d-md-table-cell">Total Fee</th> <!-- Hidden on small screens -->
                <th class="d-none d-md-table-cell">Fees Paid</th> <!-- Hidden on small screens -->
                <th class="d-none d-md-table-cell">Fees Due</th> <!-- Hidden on small screens -->
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
                <td class="d-none d-md-table-cell">{{ $student->doa }}</td> <!-- Hidden on small screens -->
                <td class="d-none d-md-table-cell">{{ $student->course->course_title }}</td> <!-- Hidden on small screens -->
                <td class="d-none d-md-table-cell">{{ $student->course->total_fees }}</td> <!-- Hidden on small screens -->
                <td class="d-none d-md-table-cell">{{ $totalPaid }}</td> <!-- Hidden on small screens -->
                <td class="d-none d-md-table-cell">{{ $student->course->total_fees - $totalPaid }}</td> <!-- Hidden on small screens -->
                <td class="{{ $statusClass }}">
                    {{ $statusText }}
                </td>
                <td>
                    <a href="{{ route('fees.single_fees', $student->id) }}" class="btn btn-info btn-sm">Details</a>
                    <a href="{{ route('fees.add_fees', $student->id) }}" class="btn btn-primary btn-sm">Pay Fee</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination -->
<!-- Pagination -->
<div class="d-flex justify-content-center">
    {{ $students->links('pagination::bootstrap-4') }}
</div>
            </div>
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


// Sync Fees Data
 
</script>
@endpush

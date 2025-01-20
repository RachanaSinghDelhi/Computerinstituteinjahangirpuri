@extends('dashboard.app')

@section('content')

<div class="container">
    <h1>Student Fees Status</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Receipts -->
    <div class="container mt-4">
        <h2>Bulk Upload Receipts</h2>
        <form action="{{ route('upload.receipts') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="startingNumber" class="form-label">Starting Number</label>
                <input type="number" name="startingNumber" id="startingNumber" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="receipts" class="form-label">Upload Receipts</label>
                <input type="file" name="receipts[]" id="receipts" class="form-control" multiple required>
            </div>
            <button type="submit" class="btn btn-success">Upload Receipts</button>
        </form>
    </div>

    <!-- Fees Table -->
    <div class="mt-4">
        <table id="feesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Course Title</th>
                    <th  class="d-none d-md-table-cell">Total Fees</th>
                    <th  class="d-none d-md-table-cell">Installments</th>
                    <th  class="d-none d-md-table-cell">Fees Paid</th>
                    <th  class="d-none d-md-table-cell">Fees Due</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feesData as $fee)
                    <tr>
                        <td>{{ $fee->student_id }}</td>
                        <td>{{ $fee->student_name }}</td>
                        <td>{{ $fee->course_title }}</td>
                        <td  class="d-none d-md-table-cell">{{ $fee->total_fees }}</td>
                        <td  class="d-none d-md-table-cell">{{ $fee->installments }}</td>
                        <td  class="d-none d-md-table-cell">{{ $fee->fees_paid }}</td>
                        <td  class="d-none d-md-table-cell">{{ $fee->fees_due }}</td>
                        <td>
                            <span class="badge 
                                @if($fee->status == 'Paid') 
                                    bg-success 
                                @elseif($fee->status == 'Paid but Pending Next Month') 
                                    bg-warning 
                                @else 
                                    bg-danger 
                                @endif
                            ">
                                {{ $fee->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('add_fees', $fee->student_id) }}" class="btn btn-primary btn-sm">Pay Now</a>
                            <a href="{{ route('fees.show', $fee->student_id) }}" class="btn btn-info btn-sm">View Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection


@push('scripts')

<script>
    $(document).ready(function() {
        // Initialize DataTable with options for pagination, search, and records per page
        $('#feesTable').DataTable({
            paging: true,
            searching: true,
            lengthChange: true, // Enable the "Show entries" dropdown
            pageLength: 10, // Default number of rows
            lengthMenu: [5, 10, 15, 20], // Dropdown options
            responsive: true,
            autoWidth: false,
            language: {
                searchPlaceholder: "Search records...",
                lengthMenu: "Show _MENU_ entries",
                paginate: {
                    next: "Next",
                    previous: "Previous"
                }
            }
        });
    });
</script>
@endpush

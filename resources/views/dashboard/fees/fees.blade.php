@extends('dashboard.app')

@section('content')

<div class="container">
    <h1>Student Fees Status</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

     <!-- Search Box -->
     <div class="mb-3">
        <input type="text" id="searchBox" class="form-control" placeholder="Search Courses...">
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <!-- Visible on mobile and larger screens -->
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Course Title</th>

                <!-- Visible only on larger screens -->
                <th class="d-none d-md-table-cell">Total Fees</th>
                <th class="d-none d-md-table-cell">Installments</th>
                <th class="d-none d-md-table-cell">Fees Paid</th>
                <th class="d-none d-md-table-cell">Fees Due</th>

                <!-- Always visible (Status and Actions) -->
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="feesBody">
            @foreach($feesData as $fee)
                <tr>
                    <!-- Visible on mobile and larger screens -->
                    <td>{{ $fee->student_id }}</td>
                    <td>{{ $fee->student_name }}</td>
                    <td>{{ $fee->course_title }}</td>

                    <!-- Visible only on larger screens -->
                    <td class="d-none d-md-table-cell">{{ $fee->total_fees }}</td>
                    <td class="d-none d-md-table-cell">{{ $fee->installments }}</td>
                    <td class="d-none d-md-table-cell">{{ $fee->fees_paid }}</td>
                    <td class="d-none d-md-table-cell">{{ $fee->fees_due }}</td>

                    <!-- Always visible (Status and Actions) -->
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
                        <!-- Pay Now Button -->
                        <a href="{{ route('add_fees', $fee->student_id) }}" class="btn btn-primary">Pay Now</a>
                    </td>
                    <td>
                        <a href="{{ route('fees.show', $fee->student_id) }}" class="btn btn-info">View Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchBox').on('keyup', function() {
            let query = $(this).val();

            $.ajax({
                url: "{{ route('search.fees') }}", // Ensure the correct route
                method: 'GET',
                data: { query: query },
                success: function(data) {
                    $('#feesBody').html(data); // Update the fees table body with the response
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

@endpush

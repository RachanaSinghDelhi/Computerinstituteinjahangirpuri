@extends('adminlte::page')

@section('title', 'Fees Received')
@section('content')


<div class="container mt-4">

<div class="mb-3">
        <br>
        <a href="{{ route('dashboard.index') }}"  class='btn btn-success btn-sm'>
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
    </div>
    <div class="mb-3">
        <br>
        <a href="{{ route('fees.index') }}"  class='btn btn-success btn-sm'>
            <i class="fas fa-plus"></i> Fees Status
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Fees Received</h3>
        </div>

        
        <div class="card-body">
            <p>Total Fees Received: {{ $fees->count() }}</p>
    <table id="feesTable" class="table table-striped">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Receipt No.</th>
                <th>Amount Paid</th>
                <th>Payment Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fees as $fee)
                <tr>
                    <td>{{ $fee->student_id }}</td>
                    <td>{{ $fee->student_name }}</td>
                    <td>{{ $fee->receipt_number }}</td>
                    <td>₹{{ number_format($fee->amount_paid, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($fee->payment_date)->format('d M Y') }}</td>
                    <td> <a href="{{ route('add_fees', $fee->student_id) }}" class="btn btn-primary btn-sm">Pay Now</a>
                    <a href="{{ route('fees.show', $fee->student_id) }}" class="btn btn-info btn-sm">View Details</a> </td>    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
 @endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function() {
        $('#feesTable').DataTable({
            "paging": true,      // Enable pagination
            "searching": true,   // Enable search
            "ordering": true,    // Enable column sorting
            "info": true,        // Show table info
            "lengthMenu": [10, 25, 50, 100], // Dropdown for entries per page
            "order": [[2, "desc"]], // Default sort by Payment Date (Latest first)
            "language": {
                "search": "Search by any field:"
            }
        });
    });
</script>
@endpush

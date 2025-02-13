@extends('dashboard.app')

@section('content')


<div class="container mt-4">

<div>
        <br>
        <a href="{{ route('dashboard.index') }}">
            <button class="btn btn-sm btn-success"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</button>
        </a>
    </div>
    <h2>Fees Received</h2>
    <table id="feesTable" class="table table-striped">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Receipt No.</th>
                <th>Amount Paid</th>
                <th>Payment Date</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Include DataTables CSS & JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#feesTable').DataTable({
            "paging": true,      // Enable pagination
            "searching": true,   // Enable search
            "ordering": true,    // Enable column sorting
            "info": true,        // Show table info
            "lengthMenu": [10, 25, 50, 100], // Dropdown for entries per page
            "order": [[4, "desc"]], // Default sort by Payment Date (Latest first)
            "language": {
                "search": "Search by any field:"
            }
        });
    });
</script>
@endsection

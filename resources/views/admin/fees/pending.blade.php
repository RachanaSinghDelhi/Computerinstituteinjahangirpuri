@extends('adminlte::page')

@section('content')
<div class="container mt-4">
    <h2>Pending Fees</h2>
    <table id="pendingFeesTable" class="table table-striped">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Amount Due</th>
                <th>Due Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fees as $fee)
                <tr>
                    <td>{{ $fee->student_id }}</td>
                    <td>{{ $fee->student_name }}</td>
                    <td>₹{{ number_format($fee->fees_due, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($fee->due_date)->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<!-- Include DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#pendingFeesTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthMenu": [10, 25, 50, 100],
            "order": [[3, "asc"]], // Default sort by Due Date (Earliest first)
            "language": {
                "search": "Search by any field:"
            }
        });
    });
</script>
@endpush

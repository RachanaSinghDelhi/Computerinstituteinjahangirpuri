@extends('teacher.layout.adminlte')
@section('title', 'Fees Management')

@section('content')

<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Approved Fees</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="approvedFeesTable" class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Total Bal.</th>
                            <th>Installment No</th>
                            <th>Date of Admission</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($approvedFees as $fee)
                            <tr>
                                <td>{{ $fee->student_id }}</td>
                                <td>{{ $fee->student_name }}</td>
                                <td>{{ $fee->course_title }}</td>
                                <td>₹{{ number_format($fee->total_balance, 2) }}</td>
                                <td>{{ $fee->installment_no }}</td>
                                <td>{{ \Carbon\Carbon::parse($fee->doa)->format('d M Y') }}</td>
                                <td><span class="badge bg-success">Approved</span></td>
                                <td>
                                    <a href="{{ route('teacher.fees.create', $fee->student_id) }}" class="btn btn-sm btn-primary">Add Fees</a>
                                    <a href="{{ route('teacher.fees.detail', $fee->student_id) }}" class="btn btn-sm btn-success">Fees Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
        </div>
    </div>

    <div class="card shadow-lg mt-4">
        <div class="card-header bg-warning text-dark">
            <h3 class="mb-0">Pending Fees</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="pendingFeesTable" class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Balance</th>
                            <th>Installment No</th>
                            <th>Due Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendingFees as $fee)
                            <tr>
                                <td>{{ $fee->student->student_id }}</td>
                                <td>{{ $fee->student->name }}</td>
                                <td>{{ $fee->course->course_title ?? 'N/A' }}</td>
                                <td>{{ $fee->balances ?? 0 }}</td>
                                <td>{{ $fee->installment_no }}</td>
                                <td>{{ \Carbon\Carbon::parse($fee->due_date)->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('teacher.fees.edit', $fee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
</div>

@endsection

@push('js')
<!-- Include DataTables CSS & JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#approvedFeesTable, #pendingFeesTable').DataTable({
            "paging": true,   // Enables pagination
            "searching": true, // Enables search
            "ordering": true, // Enables sorting
            "info": true, // Shows table info
            "lengthMenu": [10, 25, 50, 100], // Page length options
            "language": {
                "search": "Search Fees:"
            }
        });
    });
</script>
@endpush

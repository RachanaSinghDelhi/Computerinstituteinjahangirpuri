@extends('teacher.layout.adminlte')

@section('title', 'Fee Records')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Fees Records</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <h4>Pending Fees</h4>
            <div class="table-responsive">
            <table id="feesTablePending" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Student ID</th>
                        <th>Course</th>
                    
                        <th>Installment</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendingFees as $fee)
                    <tr>
                        <td>{{ $fee->student->name }}</td>
                        <td>{{ $fee->student->student_id }}</td>
                        <td>{{ $fee->course->course_name ?? 'N/A' }}</td>
                       
                        <td>{{ $fee->installment_no }}</td>
                        <td>{{ \Carbon\Carbon::parse($fee->payment_date)->format('d M Y') }}</td>

                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>
                            <a href="{{ route('teacher.fees.edit', $fee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{ route('teacher.fees.create', $fee->student->student_id) }}" class="btn btn-sm btn-primary">Add Fees</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</div>

            <h4>Approved Fees</h4>
            <div class="table-responsive">
            <table id="feesTableApproved" class="table table-bordered" >
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Student ID</th>
                        <th>Course</th>
                      
                        <th>Installment</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($approvedFees as $fee)
                    <tr>
                        <td>{{ $fee->student->name }}</td>
                        <td>{{ $fee->student->student_id }}</td>
                        <td>{{ $fee->course->course_name ?? 'N/A' }}</td>
                     
                        <td>{{ $fee->installment_no }}</td>
                        <td>{{ \Carbon\Carbon::parse($fee->payment_date)->format('d M Y') }}</td>

                        <td><span class="badge bg-success">Approved</span></td>
                        <td>
                            <a href="{{ route('teacher.fees.create', $fee->student->student_id) }}" class="btn btn-sm btn-primary">Add Fees</a>
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

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script>
    $(function () {
        $('#feesTablePending').DataTable({
      
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            columnDefs: [
            { targets: [3, 4, 5], visible: false, responsivePriority: 2 }, // Hide specific columns on small screens
        ]
        });

        $('#feesTableApproved').DataTable({
          
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            columnDefs: [
            { targets: [3, 4, 5], visible: false, responsivePriority: 2 }, // Hide specific columns on small screens
        ]
        });
    });
    </script>
@endpush

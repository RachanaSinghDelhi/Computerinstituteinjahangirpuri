@extends('teacher.layout.adminlte')
@section('title', 'Students List')
@section('content')
<div class="container container-fluid mt-4">
    <h2 class="mb-4">Student List</h2>

    <!-- Success and Error Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <br>
    <!-- Table, Search, and Buttons in One Row -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Student List</h3>
        </div>
        <div class="card-body">
            <div class="row mt-4 align-items-center">
                <div class="col-auto">
                    <!-- Search Box -->
                    <input type="text" id="searchBox" class="form-control" placeholder="Search by Student ID or Name">
                </div>
                <div class="col-auto">
                    <!-- Add Student Button -->
                    <a href="{{ route('teacher.students.add') }}" class="btn btn-sm btn-success">Add Student</a>
                </div>
            </div>
<br>
            <!-- Responsive Table -->
            <div class="table-responsive">
            <table class="table table-bordered table-striped" id="studentTable">
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th class="d-none d-md-table-cell">Father's Name</th>
            <th class="d-none d-md-table-cell">Date of Admission</th>
            <th>Course</th>
            <th class="d-none d-md-table-cell">Batch</th>
            <th>Status</th>
            <th>Fees</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
    @php
    $studentData = is_array($student->new_data) ? $student->new_data : json_decode($student->new_data, true);
    @endphp
    <tr>
        <td>{{ $studentData['student_id'] ?? 'N/A' }}</td>
        <td>{{ $studentData['name'] ?? 'N/A' }}</td>
        <td class="d-none d-md-table-cell">{{ $studentData['father_name'] ?? 'N/A' }}</td>
        <td class="d-none d-md-table-cell">{{ $studentData['doa'] ?? 'N/A' }}</td>
        {{-- ✅ Display Correct Course Name --}}
        <td>{{ $student->course_name ?? 'N/A' }}</td>
        <td class="d-none d-md-table-cell">{{ $studentData['batch'] ?? 'N/A' }}</td>
        
        <td>
            @if($student->status == 'approved')
                <span class="badge badge-success">Approved</span>
            @elseif($student->status == 'pending')
                <span class="badge badge-warning">Pending</span>
            @else
                <span class="badge badge-danger">Rejected</span>
            @endif
        </td>
        <td>
   
   <a href="{{ route('teacher.fees.create', $student->student->student_id) }}" class="btn btn-primary">Add Fees</a>


   </td>
        <td>
            @if(!empty($studentData['photo']))
                <img src="{{ asset('storage/students/' . $studentData['photo']) }}" alt="Student Photo" width="50">
            @else
                No Photo
            @endif
        </td>

        <td>
            <a href="{{ route('teacher.students.edit', ['student' => $student->student_id]) }}" class="btn btn-primary btn-sm">Edit</a>
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
        $(document).ready(function() {
            let table = $('#studentTable').DataTable({
                "order": [[0, "desc"]], // Default sorting by ID column
                "pageLength": 30 // Show 30 rows per page
            });

            // Handle search input
            $('#searchBox').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>
@endpush

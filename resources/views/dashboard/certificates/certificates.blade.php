@extends('dashboard.app')
@section('title', 'Certificates')
@section('content')
<div class="container">
    <h1 class="mb-4">Certificates</h1>

    <!-- Single Search Box -->
    
    <table id="certificateTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Father's Name</th>
                <th>Date of Admission</th>
                <th>Certificate Issuance Date</th>
                <th>Course</th>
                <th>Photo</th>
                <th>Certificate Type</th>
                <th>Duration</th>
                <th>Description</th>
                <th>Grade</th>
                <th>Code</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($paginatedCertificates as $certificate)
            <tr>
                <td>{{ $certificate->student_id }}</td>
                <td>{{ $certificate->name }}</td>
                <td>{{ $certificate->father }}</td>
                <td>{{ $certificate->dt }}</td>
                <td>{{ $certificate->date }}</td>
                <td>{{ $certificate->course }}</td>
                <td>
                    <img src="{{ asset('storage/students/' . $certificate->photo) }}" alt="Photo" width="50">
                </td>
                <td>{{ $certificate->certificate_type }}</td>
                <td>{{ $certificate->duration }}</td>
                <td>{{ $certificate->description }}</td>
                <td>{{ $certificate->grade }}</td>
                <td>{{ $certificate->code }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('scripts')

<script>
    $(document).ready(function() {
        // Initialize DataTable with options for pagination, search, and records per page
        $('#certificateTable').DataTable({
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

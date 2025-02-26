@extends('adminlte::page')
@section('title', 'Certificates')
@section('content')

<div class="container">
<div class="card">
        <div class="card-header">
            <h3 class="card-title">Certificates </h3>

             <!-- Search Box -->
    <div class="mb-4">
        <input type="text" id="certificateSearchBox" class="form-control" placeholder="Search by Student ID, Name, or Course" >
    </div>

        </div>
     <div class="card-body">
<table id="certificateTable" class="table table-bordered display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Father's Name</th>
            <th>DOA</th>
            <th>Completion Date</th>
            <th>Course</th>
            <th>Photo</th>
            <th>Duration</th>
            <th>Grade</th>
            <th>Certificate Code</th>
        </tr>
    </thead>
    <tbody id='certificateRow'>
       
        @foreach ($allCertificates as $certificate)
        <tr >
            <td>{{ $certificate->student_id }}</td>
            <td>{{ $certificate->name }}</td>
            <td>{{ $certificate->father }}</td>
            <td>{{ \Carbon\Carbon::parse($certificate->dt)->format('d-m-y')  }}</td> 
            <td>{{ \Carbon\Carbon::parse($certificate->date)->format('d-m-y') }}</td>
            <td>{{ $certificate->course }}</td>
            <td>
                <img src="{{ asset('storage/students/' . $certificate->photo) }}" width="50" alt="Photo">
            </td>
            <td>{{ $certificate->duration }}</td>
            <td>{{ $certificate->grade }}</td>
            <td>{{ $certificate->code }}</td>
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
        // Initialize DataTable with options for pagination, search, and records per page
        $('#certificateTable').DataTable({
            paging: true,
            searching: true,
            lengthChange: true, // Enable the "Show entries" dropdown
            pageLength: 10, // Default number of rows per page
            lengthMenu: [5, 10, 15, 20], // Dropdown options
            responsive: true,
            autoWidth: false,
            order: [[0, 'desc']],
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

    // Real-time search function using AJAX
    $('#certificateSearchBox').on('keyup', function() {
        var searchQuery = $(this).val();
        
        // Make an AJAX request to search and update the certificate list
        $.ajax({
            url: "{{ route('certificate.searchCertificate') }}", // Updated route name
            type: 'GET',
            data: { query: searchQuery },
            success: function(data) {
                $('#certificateRow').html(data.certificates);
              
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
</script>
@endpush

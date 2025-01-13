@extends('dashboard.app')
@section('title', 'Certificates')
@section('content')
<div class="container">
    <h1 class="mb-4">Certificates</h1>

       <!-- Single Search Box -->
       <div class="mb-4">
        <input type="text" id="searchBox" class="form-control" placeholder="Search by Student ID, Name, or Course">
    </div>
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
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $paginatedCertificates->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
@push('scripts')
<!-- Custom JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // Handle keyup event for search box
    $('#searchBox').on('keyup', function () {
        let query = $(this).val(); // Get the search query

        // Send AJAX request to search certificates
        $.ajax({
            url: '{{ route('certificate.search') }}', // Define the route for searching
            method: 'GET',
            data: { query: query },
            success: function (response) {
                // Update the table with filtered certificates
                $('#certificateTable tbody').html(response);
            },
            error: function (xhr, status, error) {
                // Check if the error is a server-side issue
                if (xhr.status === 500 && xhr.responseJSON && xhr.responseJSON.error) {
                    // Display the error message from the backend in an alert box
                    alert('Error: ' + xhr.responseJSON.error);
                } else {
                    // Display a generic error message for other types of errors
                    alert('Something went wrong. Please try again later.');
                }
            }
        });
    });
});

    </script>
@endpush
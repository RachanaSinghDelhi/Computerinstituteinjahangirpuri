@extends('dashboard.app')
@section('title', 'Certificates')
@section('content')
<div class="container">
    <h1 class="mb-4">Certificates</h1>
    <table class="table table-bordered">
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
            @foreach ($certificates as $certificate)
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
                <td>{{ $certificate->desc }}</td>
                <td>{{ $certificate->grade }}</td>
                <td>{{ $certificate->code }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot></tfoot>
    </table>
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
    <ul class="pagination pagination-sm">
        {{ $certificates->links('pagination::bootstrap-4') }}
    </ul>
</div>
</div>
@endsection

@extends('adminlte::page')

@section('title', 'Courses')

@section('content')
<div class="container">
    <div id="addCourse"></div>
    <div id="EditCourse"></div>
    <h1 class="display-4">Courses List</h1>
    <br>

    <!-- Alert Messages -->
    <div id="alert-box">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Add Course Button -->
    <div class="mb-3">
        <a href="{{ route('course.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Add New Course
        </a>
    </div>

    <!-- DataTable -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Courses List</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="coursesTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                          <th>Course URL</th>
                          <th>Content</th>
                            <th>Duration</th>
                            <th>Total Fees</th>
                            <th>Installments</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courselist as $course)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/courses/'.$course->course_image) }}" 
                                     alt="{{ $course->course_title }}" 
                                     style="max-width: 80px; height:80px; border-radius:5px;">
                            </td>
                            <td>{{ $course->course_name }}</td>
                           
                            <td>
                                <a href="{{ $course->course_url }}" target="_blank">
                                    {{ \Illuminate\Support\Str::limit($course->course_url, 30, '...') }}
                                </a>
                            </td>
                         
                            <td>{{ \Illuminate\Support\Str::limit($course->course_content, 20, '...') }}</td>
                            <td>{{ $course->duration }}</td>
                            <td>{{ $course->total_fees }}</td>
                            <td>{{ $course->installments }}</td>
                            <td>
                                <a href="{{ route('course.edit', $course->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
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
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@endpush

@push('js')
    <!-- jQuery (Ensure it's loaded) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {
        $('#coursesTable').DataTable({
            paging: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            lengthMenu: [5, 10, 15, 20, 50],
            responsive: true,
            autoWidth: false,
            columnDefs: [
                { targets: [0, 7], orderable: false } // Disable sorting on Image & Actions column
            ],
            language: {
                searchPlaceholder: "Search courses...",
                lengthMenu: "Show _MENU_ entries",
                paginate: { next: "Next", previous: "Previous" }
            }
        });
    });
</script>
@endpush
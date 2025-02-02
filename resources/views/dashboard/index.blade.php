@extends('dashboard.app')

@section('title', 'Courses')

@section('content')
<div class="container">
    <div id="addCourse"></div>
    <div id="EditCourse"></div>
    <h1 class="display-1">Courses List</h1>
    <br>

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

    <div>
        <a href="{{ route('course.create') }}">
            <button class="btn btn-sm btn-success">Add New Course</button>
        </a>
    </div>
    <br/>

    <!-- Responsive Table -->
    <div class="table-responsive">
        <table id="coursesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Course URL</th>
                    <th>Description</th>
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
                        <img src="{{ asset('storage/courses/'.$course->course_image) }}" alt="{{ $course->course_title }}" style="max-width: 100px; height:100px;">
                    </td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->course_title }}</td>
                    <td>{{ $course->course_url }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($course->course_desc, 50, '...') }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($course->course_content, 20, '...') }}</td>
                    <td>{{ $course->duration }}</td>
                    <td>{{ $course->total_fees }}</td>
                    <td>{{ $course->installments }}</td>
                    <td>
                        <a href="{{ route('course.edit', $course->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')


<script>
    $(document).ready(function() {
        // Initialize DataTable with options for pagination, search, and records per page
        $('#coursesTable').DataTable({
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

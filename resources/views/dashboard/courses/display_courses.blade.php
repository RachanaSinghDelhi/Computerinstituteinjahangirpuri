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
        <table id="coursesTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th class="d-none d-sm-table-cell">Course URL</th>
                    <th class="d-none d-sm-table-cell">Description</th>
                    <th class="d-none d-sm-table-cell">Content</th>
                    <th class="d-none d-sm-table-cell">Duration</th>
                    <th class="d-none d-sm-table-cell">Total Fees</th>
                    <th class="d-none d-sm-table-cell">Installments</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courselist as $course)
                <tr id="course-row-{{ $course->id }}">
                    <td>
                        <img src="{{ asset('storage/courses/'.$course->course_image) }}" alt="{{ $course->course_title }}" style="max-width: 100px; height:100px;">
                    </td>
                    <td>{{ $course->course_title }}</td>
                    <td class="d-none d-sm-table-cell">{{ $course->course_url }}</td>
                    <td class="d-none d-sm-table-cell">{{ \Illuminate\Support\Str::limit($course->course_desc, 50, '...') }}</td>
                    <td class="d-none d-sm-table-cell">{{ \Illuminate\Support\Str::limit($course->course_content, 50, '...') }}</td>
                    <td class="d-none d-sm-table-cell">{{ $course->duration }}</td>
                    <td class="d-none d-sm-table-cell">{{ $course->total_fees }}</td>
                    <td class="d-none d-sm-table-cell">{{ $course->installments }}</td>
                    <td>
                        <a href="{{ route('course.edit', $course->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('course.destroy', ['id' => $course->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $courselist->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection

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
        <a href="/dashboard/course">
            <button class="btn btn-sm btn-success">Add New Course</button>
        </a>
    </div>
    <br/>

    <!-- Table with courses data -->
    <table id="coursesTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr id="course-row-{{ $course->id }}">
                <td>
                    <img src="{{ asset('storage/courses/'.$course->course_image) }}" alt="{{ $course->course_title }}" style="max-width: 100px; height:100px;">
                </td>
                <td>{{ $course->course_title }}</td>
                <td>{{ \Illuminate\Support\Str::limit($course->course_desc, 150, '...') }}</td>
                <td>{{ \Illuminate\Support\Str::limit($course->course_content, 150, '...') }}</td>
                <td>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary btn-sm">Edit</a>
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

    <!-- Pagination Links -->
   
</div>
@endsection

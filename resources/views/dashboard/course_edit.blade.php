<!-- resources/views/courses/edit.blade.php -->
@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Edit Course</h1>

    <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="course_image">Course Image</label>
            <input type="file" class="form-control" name="course_image" id="course_image" value="{{ $course->course_image }}">
        </div>

        <div class="form-group">
            <label for="course_title">Course Title</label>
            <input type="text" class="form-control" name="course_title" id="course_title" value="{{ $course->course_title }}">
        </div>

        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea class="form-control" name="course_desc" id="course_desc">{{ $course->course_desc }}</textarea>
        </div>

        <div class="form-group">
            <label for="course_content">Course Content</label>
            <textarea class="form-control" name="course_content" id="course_content" rows="100">{{ $course->course_content }}</textarea>
        </div>

        <!-- Field for custom course URL -->
        <div class="form-group">
    <label for="course_url">Course URL (optional)</label>
    <input type="text" name="course_url" id="course_url" value="{{ old('course_url', $course->course_url) }}">
</div>
        <button type="submit" class="btn btn-primary">Update Course</button>
    </form>
</div>
@endsection

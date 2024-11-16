@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Edit Course</h1>

    <!-- Form for updating course using POST -->
    <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Course Image Field -->
        <div class="form-group">
            <label for="course_image">Course Image</label>
            <input type="file" class="form-control" name="course_image" id="course_image">
            <!-- Show the existing image if available -->
            @if ($course->course_image)
                <div>
                    <img src="{{ asset('storage/' . $course->course_image) }}" alt="Course Image" width="100">
                </div>
            @endif
            @error('course_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Course Title Field -->
        <div class="form-group">
            <label for="course_title">Course Title</label>
            <input type="text" class="form-control" name="course_title" id="course_title" value="{{ old('course_title', $course->course_title) }}">
            @error('course_title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <!-- Course Description Field -->
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea class="form-control" name="course_desc" id="course_desc">{{ old('course_desc', $course->course_desc) }}</textarea>
            @error('course_desc')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Course Content Field with Quill Editor -->
        <div class="form-group">
            <label for="course_content">Course Content</label>
            <!-- Hidden Textarea for storing Quill content -->
            <textarea class="form-control d-none" name="course_content" id="course_content">{{ old('course_content', $course->course_content) }}</textarea>
            <!-- Div for Quill Editor -->
            <div id="quill_editor" style="height: 300px;">{!! old('course_content', $course->course_content) !!}</div>
            @error('course_content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Course URL Field -->
        <div class="form-group">
            <label for="course_url">Course URL (optional)</label>
            <input type="text" class="form-control" name="course_url" id="course_url" value="{{ old('course_url', $course->course_url) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Course</button>
    </form>
</div>

@push('scripts')
<!-- Quill Library Scripts -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>
    // Initialize Quill editor for the content field
    var quill = new Quill('#quill_editor', {
        theme: 'snow',
        placeholder: 'Edit course content...',
        modules: {
            toolbar: [
                [{ 'header': '1'}, { 'header': '2' }, { 'font': [] }], 
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['bold', 'italic', 'underline'],
                ['link', 'image', 'video'],
                [{ 'align': [] }]
            ]
        }
    });

    // Set initial content in Quill editor
    quill.root.innerHTML = {!! json_encode($course->course_content) !!};

    // Update hidden textarea with Quill content before submitting
    document.querySelector('form').onsubmit = function() {
        document.querySelector('#course_content').value = quill.root.innerHTML;
    };
</script>
@endpush
@endsection

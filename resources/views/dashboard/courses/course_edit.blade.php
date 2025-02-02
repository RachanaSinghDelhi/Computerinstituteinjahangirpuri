@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Edit Course</h1>

    <!-- Form for updating course using PUT method -->
    <form action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Course Image Field -->
        <div class="form-group">
            <label for="course_image">Course Image</label>
            <input type="file" class="form-control" name="course_image" id="course_image">
            <!-- Show the existing image if available -->
            @if ($course->course_image)
                <div>
                    <img src="{{ asset('storage/courses/' . $course->course_image) }}" alt="Course Image" width="100">
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
        <!-- Course Title Field -->
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" name="course_name" id="course_name" value="{{ old('course_name', $course->course_name) }}">
            @error('course_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

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
    <!-- Div for Quill Editor -->
    <div id="quill_editor">{!! old('course_content', $course->course_content) !!}</div>
    
  <!-- Hidden Input Field for storing Quill content -->
  <input type="hidden" name="course_content" id="course_content" value="{{ old('course_content', $course->course_content) }}">

    <!-- Error Message -->
    @error('course_content')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


<div class="form-group">
        <label for="duration">Duration (in months)</label>
        <input type="number" class="form-control" name="duration" id="duration" 
               value="{{ old('duration', $course->duration) }}" min="1">
        @error('duration')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="total_fees">Total Fees</label>
        <input type="number" class="form-control" name="total_fees" id="total_fees" 
               value="{{ old('total_fees', $course->total_fees) }}" min="0">
        @error('total_fees')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="installments">Installments</label>
        <input type="number" class="form-control" name="installments" id="installments" 
               value="{{ old('installments', $course->installments) }}" min="1">
        @error('installments')
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
   // Initialize Quill editor
var quill = new Quill('#quill_editor', {
    theme: 'snow',
    placeholder: 'Edit course content...',
    modules: {
        toolbar: [
            [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            ['bold', 'italic', 'underline'],
            ['link', 'image', 'video'],
            [{ 'align': [] }]
        ]
    }
});

// Event listener to update hidden textarea
quill.on('text-change', function() {
    // Update hidden textarea with the HTML content of the editor
    document.querySelector('#course_content').value = quill.root.innerHTML;
});

// Ensure textarea content is updated on form submit
document.querySelector('form').onsubmit = function() {
    document.querySelector('#course_content').value = quill.root.innerHTML;
};

</script>
@endpush
@endsection

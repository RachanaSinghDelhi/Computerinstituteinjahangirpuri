<!-- dashboard/course.blade.php -->
@extends('dashboard.app')
@section('title', 'Courses')
@section('content')

    <div class="row justify-content-center">
        <br>

        <div class="col-md-6">
            <br>

            <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data" id="courseForm">
                @csrf

                <div class="mb-3">
                    <label for="course_title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="course_title" name="course_title">
                    @error('course_title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="course_desc" class="form-label">Description:</label>
                    <textarea class="form-control" id="course_desc" name="course_desc"></textarea>
                    @error('course_desc')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="course_content" class="form-label">Content:</label>
                    <div id="quill-editor"></div>
                    <input type="hidden" id="course_content" name="course_content">
                    @error('course_content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="course_image" class="form-label">Image:</label>
                    <input type="file" class="form-control" id="course_image" name="course_image">
                    @error('course_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <p>
                    <label for="course_url">Course URL (optional)</label>
                    <input type="text" name="course_url" id="course_url">
                </p>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <br>
        </div>
    </div>


@push('scripts')
<!-- Add Quill JS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    // Initialize Quill for the content textarea only
    var quillContent = new Quill('#quill-editor', {
        theme: 'snow',
        placeholder: 'Write the course content...',
        modules: {
            toolbar: [
                [{ 'header': '1'}, { 'header': '2' }, { 'font': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['bold', 'italic', 'underline'],
                ['link'],
                [{ 'align': [] }],
                ['image', 'video']
            ]
        }
    });

    // Update hidden input on form submit
    document.getElementById('courseForm').onsubmit = function() {
        document.getElementById('course_content').value = quillContent.root.innerHTML;
    };
</script>
@endpush
@endsection

@extends('dashboard.app')
@section('title', 'Add Course')
@section('content')

    <div class="row justify-content-center">
        <br>
        <div class="col-md-6">
            <br>
            <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data" id="courseForm">
                @csrf

                <div class="mb-3">
                    <label for="course_title" class="form-label">Course Title:</label>
                    <input type="text" class="form-control" id="course_title" name="course_title" value="{{ old('course_title') }}">
                    @error('course_title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="course_desc" class="form-label">Description:</label>
                    <textarea class="form-control" id="course_desc" name="course_desc">{{ old('course_desc') }}</textarea>
                    @error('course_desc')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="course_content" class="form-label">Course Content:</label>
                    <div id="quill-editor"></div>
                    <input type="hidden" id="course_content" name="course_content">
                    @error('course_content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="course_image" class="form-label">Course Image:</label>
                    <input type="file" class="form-control" id="course_image" name="course_image">
                    @error('course_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="course_url" class="form-label">Course URL (Optional):</label>
                    <input type="text" class="form-control" id="course_url" name="course_url" value="{{ old('course_url') }}">
                    @error('course_url')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <br>
        </div>
    </div>

@push('scripts')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.4.0/purify.min.js"></script>
<script>
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

    document.getElementById('courseForm').onsubmit = function(event) {
        const content = quillContent.root.innerHTML.trim();
        if (content === '<p><br></p>' || content === '') {
            alert('Please write some content before submitting.');
            event.preventDefault();
            return false;
        }

        // Sanitize and update hidden input
        const sanitizedContent = DOMPurify.sanitize(content);
        document.getElementById('course_content').value = sanitizedContent;
    };
</script>
@endpush

@endsection

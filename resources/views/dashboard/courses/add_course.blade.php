@extends('dashboard.layout.adminlte')

@section('title', 'Add Course')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-adminlte-card title="Add Course" theme="primary" icon="fas fa-book">
                <form method="POST" action="{{ route('course.store') }}" enctype="multipart/form-data" id="courseForm">
                    @csrf

                    <x-adminlte-input name="course_title" label="Course Title" placeholder="Enter course title"
                        value="{{ old('course_title') }}" required />

                    <x-adminlte-input name="course_name" label="Course Name" placeholder="Enter course name"
                        value="{{ old('course_name') }}" required />

                    <x-adminlte-textarea name="course_desc" label="Description" placeholder="Enter course description">
                        {{ old('course_desc') }}
                    </x-adminlte-textarea>

                    <div class="mb-3">
                        <label for="course_content" class="form-label">Course Content:</label>
                        <div id="quill-editor" class="border p-2" style="min-height: 200px;"></div>
                        <input type="hidden" id="course_content" name="course_content">
                    </div>

                    <x-adminlte-input-file name="course_image" label="Course Image" />

                    <x-adminlte-input name="course_url" label="Course URL (Optional)" placeholder="Enter course URL"
                        value="{{ old('course_url') }}" />

                    <x-adminlte-input name="duration" type="number" label="Duration (in months)"
                        placeholder="e.g., 6" min="1" />

                    <x-adminlte-input name="total_fees" type="number" label="Total Fees" placeholder="e.g., 5000" />

                    <x-adminlte-input name="installments" type="number" label="Installments" placeholder="e.g., 3" />

                    <x-adminlte-button type="submit" label="Submit" theme="success" icon="fas fa-save" />
                </form>
            </x-adminlte-card>
        </div>
    </div>
</div>

@push('css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('js')
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

@extends('dashboard.app')

@section('content')
<div class="container mt-4">
    <h2>Create New Post</h2>

    {{-- Display success message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Post creation form --}}
    <form id="form" action="{{ route('dashboard.store_post') }}" method="POST" enctype="multipart/form-data" class="mt-4">

        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <div id="quill-editor"></div>
                    <input type="hidden" id="content" name="content">
                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image:</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
@endsection

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

        document.getElementById('form').onsubmit = function(event) {
        const content = quillContent.root.innerHTML.trim();
        if (content === '<p><br></p>' || content === '') {
            alert('Please write some content before submitting.');
            event.preventDefault();
            return false;
        }

        // Sanitize and update hidden input
        const sanitizedContent = DOMPurify.sanitize(content);
        document.getElementById('content').value = sanitizedContent;
    };
    </script>
@endpush

@extends('dashboard.app')

@section('content')
<div class="container">
    <h2>Edit Post</h2>

    <!-- Display Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Post Form -->
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" id="edit-post-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <!-- Quill editor container -->
            <div id="editor">
                {!! old('content', $post->content) !!}
            </div>
            
             <!-- Hidden Input Field for storing Quill content -->
  <input type="hidden" name="content" id="content" value="{{ old('content', $post->content) }}">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($post->image)
                <p>Current Image: <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" width="100"></p>
            @endif
        </div>
        
        <div class="form-group">
            <label for="url">Post URL</label>
            <input type="text" name="url" id="url" class="form-control" value="{{ old('url', $post->url) }}" required>
        </div>

<div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" name="tags" id="tags" class="form-control" value="{{ old('tags', $post->tags) }}" placeholder="Comma separated tags">
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
@endsection

<!-- Include Quill's CSS and JS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Quill editor
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['bold', 'italic', 'underline'],
                    [{ 'align': [] }],
                    ['link', 'image'],
                    ['blockquote', 'code-block']
                ]
            }
        });

        // Set the initial content of Quill (if there is any) from the backend
        quill.root.innerHTML = {!! json_encode(old('content', $post->content)) !!};

        // When submitting the form, get the raw HTML content from Quill and set it in the hidden textarea
        var form = document.getElementById('edit-post-form');
        form.onsubmit = function() {
            var content = document.getElementById('content');
            content.value = quill.root.innerHTML; // Get the HTML content from Quill editor
        };
    });
</script>

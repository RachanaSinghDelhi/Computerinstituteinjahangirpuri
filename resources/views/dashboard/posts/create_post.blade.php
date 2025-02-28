@extends('dashboard.layout.adminlte')

@section('title', 'Create Post')

@section('content_header')
 
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        {{-- Success Message --}}
        @if (session('success'))
            <x-adminlte-alert theme="success" title="Success">
                {{ session('success') }}
            </x-adminlte-alert>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <x-adminlte-alert theme="danger" title="Error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-adminlte-alert>
        @endif

        {{-- Post Creation Form --}}
        <x-adminlte-card title="New Post" theme="primary" icon="fas fa-edit">
            <form id="postform" action="{{ route('posts.store_post') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Title --}}
                <x-adminlte-input name="title" label="Title" placeholder="Enter post title" required />

                {{-- Content Editor --}}
                <div class="form-group">
                    <label for="content">Content:</label>
                    <div id="quill-editor" class="border p-2" style="min-height: 150px;"></div>
                    <input type="hidden" id="content" name="content">
                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Image Upload --}}
                <x-adminlte-input-file name="image" label="Upload Image" placeholder="Choose an image" />

                {{-- Tags --}}
                <x-adminlte-input name="tags" label="Tags" placeholder="Enter tags separated by commas" />

                {{-- URL --}}
                <x-adminlte-input name="url" label="URL" placeholder="Enter an optional URL" />

                {{-- Submit Button --}}
                <x-adminlte-button type="submit" label="Create Post" theme="success" icon="fas fa-save" />
            </form>
        </x-adminlte-card>
    </div>
</div>
@endsection

@push('css')
    {{-- Quill Editor Styles --}}
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('js')
    {{-- Quill Editor --}}
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.4.0/purify.min.js"></script>

    <script>
        var quillContent = new Quill('#quill-editor', {
            theme: 'snow',
            placeholder: 'Write your post content here...',
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

        document.getElementById('postform').onsubmit = function(event) {
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

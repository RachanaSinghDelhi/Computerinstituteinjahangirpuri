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
<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control" required>{{ old('content', $post->content) }}</textarea>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control">
        @if ($post->image)
            <p>Current Image: <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" width="100"></p>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Update Post</button>
</form>
</div>
@endsection

@extends('dashboard.app')

@section('content')

<div class="container container-fluid mt-4">
<h2>Post List</h2>

<!-- Display Success Message -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Posts Table -->
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ Str::limit($post->content, 50) }}</td> <!-- Limiting the content length for display -->
                <td>
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="100">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <!-- You can add actions like Edit and Delete here -->
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No posts available</td>
            </tr>
        @endforelse
    </tbody>
</table>

</div>
@endsection

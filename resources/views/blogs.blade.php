@extends('layout')

@section('title', 'Blogs')

@section('content')

<div class="container">
    <h2 class="my-4">Our Blog Posts</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <!-- Post Image Wrapper with Fixed Height -->
                    <div class="image-wrapper" style="height: 250px; overflow: hidden;">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default.png') }}" class="card-img-top" alt="Default Image" style="width: 100%; height: 100%; object-fit: cover;">
                        @endif
                    </div>
                    
                    <!-- Card Body with Content -->
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{!! Str::limit($post->content, 100) !!}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No posts available at the moment.</p>
        @endforelse
    </div>
</div>

@endsection

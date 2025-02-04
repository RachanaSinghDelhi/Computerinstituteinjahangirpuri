@php
    // Set banner image and breadcrumbs
    $bannerImage = asset('assets/images/Sliders_image/medal1_nice_computer_institute_jahangirpuri.jpg');
  
@endphp
@extends('layout.app')

@section('title', 'Updates')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-5">Updates</h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @forelse ($posts as $post)
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card shadow-sm border-light rounded h-100">
                    <!-- Post Image Wrapper with Fixed Height -->
                    <div class="image-wrapper" style="height: 250px; overflow: hidden;">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default.png') }}" class="card-img-top" alt="Default Image" style="width: 100%; height: 100%; object-fit: cover;">
                        @endif
                    </div>

                    <!-- Card Body with Content -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">{{ $post->title }}</h5>
                        <p class="text-muted small mb-2">By <strong>{{ $post->author->name }}</strong> | {{ $post->created_at->format('M d, Y') }}</p>
                        <p class="card-text text-muted mb-3">{{ Str::limit(strip_tags($post->content), 150) }}</p>

                        @if ($post->tags)
                            <p class="mb-3">
                                <strong>Tags:</strong> 
                                <span class="badge bg-secondary">{{ $post->tags }}</span>
                            </p>
                        @endif

                        <a href="{{ url('/posts/'. $post->url) }}" class="btn btn-primary mt-auto">Read More</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center col-12">No posts available at the moment.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
    {{ $posts->links() }}
    </div>
</div>
@endsection

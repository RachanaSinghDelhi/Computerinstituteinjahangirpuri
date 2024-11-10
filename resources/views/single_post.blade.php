@extends('layout2')

@section('content')
    <div class="container my-5">

        <!-- Post Title and Content -->
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="display-4 mb-3">{{ $post->title }}</h2>
                <p class="lead">{!! $post->content!!}</p>

                <!-- Optionally, add Date of Post -->
                <p class="text-muted">Posted on: {{ $post->created_at->format('M d, Y') }}</p>
                
                <!-- Post Tags or Categories (if applicable) 
                <div class="mt-3">
                    <strong>Categories:</strong>
                    <span class="badge bg-secondary">{{ $post->category ? $post->category->name : 'Uncategorized' }}</span>
                </div>-->
            </div>
        </div>

        <!-- Back to Blog Posts -->
        <div class="row mt-4">
            <div class="col-12">
                <a href="{{ route('blogs') }}" class="btn btn-primary">Back to Blog</a>
            </div>
        </div>
    </div>
@endsection

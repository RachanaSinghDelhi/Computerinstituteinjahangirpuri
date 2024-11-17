@extends('layout')

@section('title', 'Courses')

@section('content')
<div class="container">
    <h2 class="my-4">Our Courses</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse ($courses as $course)
            <div class="col-md-6 col-12 mb-4">
                <div class="card">
                    <!-- Course Image Wrapper with Fixed Height -->
                    <div class="image-wrapper" style="height: 250px; overflow: hidden;">
                        @if ($course->course_image)
                            <img src="{{ asset('storage/courses/'. $course->course_image) }}" class="card-img-top" alt="{{ $course->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default_course.png') }}" class="card-img-top" alt="Default Course Image" style="width: 100%; height: 100%; object-fit: cover;">
                        @endif
                    </div>
                    
                    <!-- Card Body with Content -->
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->course_title }}</h5>
                        <p class="card-text">{{ Str::limit(strip_tags($course->course_desc), 100) }}</p>
                        <h6 class="text-primary"><a href="tel:9312945741">Enroll</a></h6>
                        <a href="{{ url('/course/' . $course->course_url) }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No courses available at the moment.</p>
        @endforelse
    </div>
</div>
@endsection

@php
    // Set banner image and breadcrumbs
    $bannerImage = !empty($course->course_image) ? asset('storage/courses/' . $course->course_image) : asset('assets/images/Sliders_image/medal1_nice_computer_institute_jahangirpuri.jpg');

  
@endphp

@extends('layout.app')

@section('content')

     <!-- Course details section -->
    <div class="container mt-4">
        <h2>{{ $course->course_name }}</h2>
        <p>{!! $course->course_desc !!}</p>
    
        <p>{!! $course->course_content !!}</p>
    </div>

 @endsection
@extends('layout.app')

@section('content')

     <!-- Course details section -->
    <div class="container mt-4">
        <h2>{{ $course->course_name }}</h2>
        <p>{!! $course->course_desc !!}</p>
    
        <p>{!! $course->course_content !!}</p>
    </div>

 @endsection
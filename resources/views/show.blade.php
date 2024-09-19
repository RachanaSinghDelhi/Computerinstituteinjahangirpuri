

@include('partials.header',['courses' => $courses])
<div class="banner" style="background-image: url('{{ asset('storage/' . $course->course_image) }}'); height: 400px; background-size: cover; background-position: center;">
        <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); height: 100%; display: flex; justify-content: center; align-items: center;">
            <h1 style="color: #fff;">{{ $course->course_title }}</h1>
        </div>
    </div>

     <!-- Course details section -->
    <div class="container mt-4">
        <h2>{{ $course->course_title }}</h2>
        <p>{!! $course->course_desc !!}</p>
    
        <p>{!! $course->course_content !!}</p>
    </div>

    @include('partials.footer');

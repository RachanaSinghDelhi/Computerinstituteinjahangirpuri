@section('title', "$course->course_title")

@include('partials.course_header',['courses' => $courses])
<div class="banner" style="background-image: url('{{ asset('storage/courses/' . $course->course_image) }}'); height: 400px; background-size: cover; background-position: center;">
        <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); height: 100%; display: flex; justify-content: center; align-items: center;">
        <div class="container-fluid bg-breadcrumb">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                <li class="breadcrumb-item">
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a>
                </li>
            @endforeach
        </ol>
    </nav>
            </div>
        </div>
    </div>

     <!-- Course details section -->
    <div class="container mt-4">
        <h2>{{ $course->course_title }}</h2>
        <p>{!! $course->course_desc !!}</p>
    
        <p>{!! $course->course_content !!}</p>
    </div>

    @include('partials.footer');
    <script>
 document.addEventListener('DOMContentLoaded', function() {
    var spinner = document.getElementById('spinner');
    if (spinner) {
        console.log('Spinner found');
        spinner.style.visibility = 'hidden'; // Hide spinner using visibility
        // Or alternatively:
        // spinner.style.opacity = '0'; // Hide spinner using opacity
    }
});
</script>
<!-- AOS JS -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/bootstrap5/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>-->
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>

@extends('layout.app')
@section('title', 'Home')
@section('content')

<!-- Main Content -->
<main>
    <!-- Hero Section -->
    <div class="container">
        <h1 class="display-3 text-center">Unlock Your Potential at Nice Computer Institute in Jahangirpuri</h1>
    </div>

    <!-- Introduction Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center"><b>Introduction</b></h2>
            <hr>
            <div class="row gy-3 align-items-center">
                <div class="col-12 col-lg-6">
                    <img class="img-fluid img-thumbnail" src="{{ asset('assets/images/manager_computer-institute-in-jahangirpuri.jpeg') }}" alt="Manager at Computer Institute in Jahangirpuri">
                </div>
                <div class="col-12 col-lg-6">
                    <h3 class="h1 py-4">Who Are We?</h3>
                    <p class="lead text-secondary">Best Computer Training in Jahangirpuri</p>
                    <p>Nice Computer Institute provides the best computer training in Jahangirpuri. Explore the unlimited boundaries of knowledge and skills with us.</p>
                    <a href="{{ route('introduction.page') }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="bg-danger text-center text-white py-5">
        <h2 class="fw-bold">THE BEST PRICING WE OFFER</h2>
        <a href="tel:9312945741" class="btn btn-outline-light btn-lg" style="border-radius: 50px;">Call Now: 9312945741</a>
    </section>

    <!-- Courses Section -->
    <section class="py-5">
        <h2 class="display-4 text-center">World Class Education</h2>
        <div class="container">
            <div class="row">
                @foreach($courses->take(9) as $course)
                    <div class="col-md-4 mb-4">
                        <div class="card bg-light h-100">
                            <div class="card-body text-center">
                                @if($course->course_image)
                                    <img src="{{ asset('storage/courses/' . $course->course_image) }}" alt="{{ $course->course_title }}" class="img-fluid mb-3" style="height: 200px; object-fit: cover; border-radius: 8px;">
                                @else
                                    <i class="fa fa-book fa-3x mb-3"></i>
                                @endif
                                <h5 class="card-title">{{ $course->course_title }}</h5>
                                <p class="text-muted">{{ \Illuminate\Support\Str::limit($course->course_desc, 100) }}</p>
                                <a href="{{ url('/course/' . $course->course_url) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/medal5_nice_computer_institute_jahangirpuri.jpg') }}" class="img-fluid" alt="Medal at Nice Computer Institute in Jahangirpuri">
                </div>
                <div class="col-md-6">
                    <h3>Why Nice Computer Institute?</h3>
                    <p>Since 2001, we have been providing top-notch education in various computer courses like Graphic Design, Tally, Web Design, and more. Our education process facilitates success for all learners.</p>
                    <a href="/about" class="btn btn-success">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted by Students Section -->
    <section class="bg-danger text-center text-white py-5">
        <h2 class="fw-bold">TRUSTED BY OVER 10,000 STUDENTS</h2>
        <a href="#" class="btn btn-outline-light btn-lg" style="border-radius: 50px;">Get Started</a>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <h2 class="display-4 text-center">Features</h2>
        <hr>
        <div class="container">
            <p>Highlighting the features of Nice Computer Institute in Jahangirpuri:</p>
            <div class="row gy-4">
                <div class="col-md-6">
                    <div class="d-flex">
                        <div class="me-4 text-primary">
                            <i class="bi bi-gear-fill fs-2"></i>
                        </div>
                        <div>
                            <h4>Expert Faculty</h4>
                            <p>Our team of experienced and certified instructors ensures top-notch education with real-world expertise.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex">
                        <div class="me-4 text-primary">
                            <i class="bi bi-fire fs-2"></i>
                        </div>
                        <div>
                            <h4>Advanced Curriculum</h4>
                            <p>Our curriculum is designed to meet the latest industry standards and equip students with in-demand skills.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

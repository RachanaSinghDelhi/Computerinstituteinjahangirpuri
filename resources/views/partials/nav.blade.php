<nav class="navbar topbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topbar" aria-controls="topbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-arrow-down fa-2x" style="color:#fff;"></span>
        </button>
        <div class="collapse navbar-collapse" id="topbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <a class="nav-link"><i class="fa fa-clock-o"></i> Mon - Fri 8AM-8PM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tel:9312945741"><i class="fa fa-phone"></i> Call Now</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mailto:nicewebtechnologies@gmail.com"><i class="fa fa-envelope"></i> nicewebtechnologies@gmail.com</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-map-marker"></i> A1- 9/10, Jahangirpuri Rd, Delhi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tel:9312945741"><i class="fa fa-phone"></i> 9312945741</a> 
                </li>
            </ul>
        </div>
    </div>
</nav>

<header1>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('assets/images/logo1_3D_half.png') }}" alt="Logo" width="100" height="80" class="me-2">
                <div>
                    <span>Nice Computer Institute</span><br>
                    <small class="">Be a Part Of I.T.</small>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="coursesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Courses</a>
                        <ul class="dropdown-menu" aria-labelledby="coursesDropdown">
                            @foreach($courses->take(7) as $course)
                                <li><a class="dropdown-item"  href="{{ url('/courses/' . $course->course_url) }}">{{ $course->course_name }}</a></li>
                            @endforeach
                            <li><a class="dropdown-item" href="/courses_list">More ..</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/blogs">Updates</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('faq') }}">FAQs</a></li>
                    <li class="nav-item">
                    <li class="nav-item">
    <a class="nav-link" href="https://wa.me/9312945741">
        <i class="fa fa-whatsapp" style="font-size:40px; color:rgb(4, 41, 4);"></i>
    </a>
</li>

                    </li>
                </ul>
            </div>
        </div>
    </nav>


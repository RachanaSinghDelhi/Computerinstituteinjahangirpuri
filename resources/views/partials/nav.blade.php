<nav class=" navbar topbar navbar-expand-lg">

            <div class="container container-fluid">
                <button class="navbar-toggler flex top-button" type="button" data-bs-toggle="collapse" data-bs-target="#topbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-arrow-down fa-2x " style="color:#002147;"></span></button>
                <div class="collapse navbar-collapse" id="topbar">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0  menu_list">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#"> <i class="fa fa-clock-o " style="color:#fff;"></i>Mon - Fri 7AM-8PM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-phone" style="color:#fff;"> 9312945741 </i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-paper-plane" style="color:#fff;"></i> A1- 9/10, A Block Rd, near Da Pizza Palace,Jahangirpuri, Delhi, 110033</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-envelope" style="color:#fff;"></i> nicewebtechnologies@gmail.com</a>
                        </li>
                    </ul>
                    <!-- <p class="collapse navbar-collapse py-2" id="topbar">
                            <i class="fa fa-paper-plane" style="color:#fff;"></i><a aria-current="page" href="#">Mon - Fri 7AM-8PM &nbsp;&nbsp;</a>
                            <i class="fa fa-phone" style="color:#fff;"> </i><a aria-current="page" href="#">9312945741 &nbsp;&nbsp;</a>
                        </p>-->
                     <ul>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/login"><i class="fa fa-user" style="color:#fff;"></i> Admin Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <br><br>

    <!-- topbar--->
    <!---Navabr --->

    <header1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light nav_nice">
            <div class="container container-fluid">
            <img src="{{ asset('assets/images/logo1_3D_half.png') }}" width="150" height="100">

                <p class="logo"><a class="navbar-brand brand_nice " href="#">Nice Computer Institute</a><br>
                    <a class="tagline_nice" href="#">Be a Part Of I.T.</a>
                </p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon nice_toggler"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0  menu_list">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Courses
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        @foreach($courses as $course)
            <li><a class="dropdown-item" href="{{ route('course.show', $course->id) }}">{{ $course->course_title }}</a></li>
        @endforeach
        <!-- <li><a class="dropdown-item" href="#">Basic</a></li> -->
    </ul>
</li>
                        <li class="nav-item">
                            <a class="nav-link " href="/blogs">Updates</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-light"> <span class="whatsapp"><a href="https://wa.me/9312945741"><i class="fa fa-whatsapp" style="font-size:48px;color:green;"></i></a></span></button>
                        </li>
                    </ul>


                </div>
            </div>
        </nav>


    <header1>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav_nice " style="background-color:black">
            <div class="container container-fluid">
            <img src="{{ asset('assets/images/logo1_3D_half.png') }}" width="150" height="100">

                <p class="logo"><a class="navbar-brand brand_nice " href="/">Nice Computer Institute</a><br>
                    <a class="tagline_nice text-white" href="#" style="text-decoration:none">Be a Part Of I.T.</a>
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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" id="course" data-bs-toggle="dropdown" aria-expanded="false">
                                Courses
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="get_course">
                           @foreach($courses as $course)
                                <li><a class="dropdown-item" href="{{  route('course.show', $course->id)  }}">{{ $course->course_title }}</a></li>
                            @endforeach
                                <!--   <li><a class="dropdown-item " href="#">Baic</a></li> -->
                            </ul>
                           
                             
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/blogs">Updates</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-light"> <span class="whatsapp"><a href="https://wa.me/9312945741"><i class="fa fa-whatsapp" style="font-size:48px;color:green;"></i></a></span></button>
                        </li>
                    </ul>


                </div>
            </div>
        </nav>
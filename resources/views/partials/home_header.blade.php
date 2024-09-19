
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nice Computer Institute &#8211; Be a Part Of I.T</title>
    <link rel="icon" href="{{ asset('images/logo_new_icon_nice_computer_institute_jahangirpuri.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="{{ asset('assets/bootstrap5/bootstrap-5.0.2-dist/fonts/font.woff2') }}" rel="stylesheet">
</head>

<body>
    <!---topbar-->
    <div class="main-top" style="z-index: index 1000;">

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
                            <a class="nav-link " href="/new">News</a>
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

        <!--- navabr ends -->

        <!---crousel starts -->

    
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
           
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{ asset('assets/images/Sliders_image/computer-institute-in-jahangirpuri-1-1024x771.jpg') }}" class="d-block w-100" alt="Computer Institute in Jahangirpuri">
                    <div class="carousel-caption">
                        <h5 class="animate__animated animate__bounceInRight animate__delay-1s">Computer Institute In Jahangirpuri</h5>
                        <p class="animate__animated animate__bounceInLeft animate__delay-2s d-none d-md-block">Nice Computer Institute since 2001 is one of the best & courses offered are graphic design, Marg, Tally,Adv.Exl,Web Design & development,Basic,busy...</p>
                        <p class="know"> <a href="#" class="animate__animated animate__bounceInRight animate__delay-3s know">Know More</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                <img src="{{ asset('assets/images/Sliders_image/medal1_nice_computer_institute_jahangirpuri.jpg') }}" class="d-block w-100" alt="Medal at Nice Computer Institute in Jahangirpuri">
                    <div class="carousel-caption ">
                        <h5 class="animate__animated animate__bounceInRight animate__delay-1s" style="animation-delay:1s">
                            Basic Courses</h5>
                        <p class="animate__animated animate__bounceInLeft animate__delay-2s d-none d-md-block">Nice Computer Institute Provides with the best job oriented computer course in Jahangirpuri. This course comprises of ...</p>
                        <p class="know"> <a href="#" class="animate__animated animate__bounceInRight animate__delay-3s know">Know More</a></p>
                    </div>

                </div>
                <div class="carousel-item">
                <img src="{{ asset('assets/images/Sliders_image/annual_function_nice_computer_institute_jahangirpuri.jpg') }}" class="d-block w-100" alt="Annual Function at Nice Computer Institute in Jahangirpuri">
                <div class="carousel-caption ">        
                <h5 class="animate__animated animate__bounceInRight animate__delay-1s">Advance Excel</h5>
                        <p class="animate__animated animate__bounceInLeft animate__delay-2s d-none d-md-block">Advanced Excel institute in Jahangirpuri Nice Computer is known for Excel developers who want to channel their skills into building spreadsheet applications and dashboards. Nice Computer institute..</p>
                        <p class="know"> <a href="#" class="animate__animated animate__bounceInRight animate__delay-3s know">Know More</a></p>
                    </div>

                </div>
                <div class="carousel-item">
                <img src="{{ asset('assets/images/Sliders_image/autocad_nice_computer_institute_jahangirpri.jpg') }}" class="d-block w-100" alt="AutoCAD at Nice Computer Institute in Jahangirpuri">
                    <div class="carousel-caption">
                        <h5 class="animate__animated animate__bounceInRight animate__delay-1s">
                            AutoCAD Training </h5>
                        <p class="animate__animated animate__bounceInLeft animate__delay-2s d-none d-md-block">AutoCad training at Nice Computer Institute in Jahangirpuri. AutoCAD is computer-aided design (CAD) software that architects, engineers and construction professionals rely on to create...</p>
                        <p class="know"><a href="#" class="animate__animated animate__bounceInRight animate__delay-3s">Know More</a></p>
                    </div>

                </div>
                <div class="carousel-item">
                <img src="{{ asset('assets/images/Sliders_image/graphic_design_nice_computer_institute_jahangirpuri.jpg') }}" class="d-block w-100" alt="Graphic Design at Nice Computer Institute in Jahangirpuri">
                    <div class="carousel-caption">
                        <h5 class="animate__animated animate__bounceInRight animate__delay-1s">
                            Graphic Design</h5>
                        <p class="animate__animated animate__bounceInLeft animate__delay-2s d-none d-md-block">Graphic Design Concepts & Practices,Elements of design,Typography,Color,Layout</p>
                        <p class="know"> <a href="#" class="animate__animated animate__bounceInRight animate__delay-3s">Know More</a></p>
                    </div>

                </div>
            </div>
                
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
           
        </div>


        
       
    
    </header1>

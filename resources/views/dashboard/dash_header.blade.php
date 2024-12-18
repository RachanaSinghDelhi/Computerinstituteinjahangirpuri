<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'Nice Computer Institute')</title>
    <link rel="icon" href="https://www.computerinstituteindelhijahangirpuri.com/assets/images/nice.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  
     <!-- Cropper.js CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container container-fluid">
            <img src="{{ asset('assets/images/logo1_3D_half.png') }}" width="150" height="100" alt="Logo">
            <p class="logo">
                <a class="navbar-brand brand_nice" href="/">Nice Computer Institute</a>
                <br>
                <a class="tagline_nice" href="#">Be a Part Of I.T.</a>
            </p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon nice_toggler"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 menu_list">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/dashboard">Courses</a>
                    </li>
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Courses
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item dash" href="/dashboard/add_course" style="color:white;">Add Course</a></li>
                            <li><a class="dropdown-item dash" href="/dashboard" style="color:white;">Course List</a></li>
                            <li><a class="dropdown-item dash" href="/import-courses" style="color:white;">Import Courses Excel</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Posts
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item dash" href="/dashboard/create-post" style="color:white;">Add Post</a></li>
                            <li><a class="dropdown-item dash" href="/dashboard/new-posts" style="color:white">Post List</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Students
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item dash" href="/dashboard/add-student" style="color:white;">Add Student</a></li>
                            <li><a class="dropdown-item dash" href="/dashboard/ajaxstudents" style="color:white;">Edit Student</a></li>
                            <li><a class="dropdown-item dash" href="{{ route('students.index') }}" style="color:white">Student List</a></li>
                            <li><a class="dropdown-item dash" href="{{ route('students.id-cards') }}" style="color:white">ID Cards</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           Fees
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item dash" href="/fees" style="color:white;">Fees</a></li>
                            <li><a class="dropdown-item dash" href="/dashboard/add_fees" style="color:white;">Add Fees</a></li>
                           
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Certificates
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item dash" href="/certificates" style="color:white;">Certificates</a></li>
                            <li><a class="dropdown-item dash" href="/import-excel" style="color:white;">Import Certificate Type Excel</a></li>
                           
                        </ul>
                    </li>


                    <li class="nav-item">
                    <form action="{{ route('admin.logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
</header>

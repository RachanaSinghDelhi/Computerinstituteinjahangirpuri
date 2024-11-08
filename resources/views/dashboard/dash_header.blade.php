<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'Nice Computer Institute')</title>
    <link rel="icon" href="{{ asset('images/logo_new_icon_nice_computer_institute_jahangirpuri.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container container-fluid">
            <img src="{{ asset('assets/images/logo1_3D_half.png') }}" width="150" height="100" alt="Logo">
            <p class="logo">
                <a class="navbar-brand brand_nice" href="#">Nice Computer Institute</a>
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
                            <li><a class="dropdown-item dash" href="/dashboard/course">Add Course</a></li>
                            <li><a class="dropdown-item dash" href="/dashboard">Course List</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Posts
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item dash" href="/dashboard/create-post" style="color:white">Add Post</a></li>
                            <li><a class="dropdown-item dash" href="/dashboard/new-posts" style="color:white">Post List</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-light">
                            <span class="whatsapp">
                                <a href="https://wa.me/9312945741">
                                    <i class="fa fa-whatsapp" style="font-size:48px;color:green;"></i>
                                </a>
                            </span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

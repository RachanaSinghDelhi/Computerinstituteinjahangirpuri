<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    @include('partials.header', ['courses' => $courses])

 
   <!--<div class="banner" style="background-image: url('{{  asset('assets/images/Sliders_image/medal1_nice_computer_institute_jahangirpuri.jpg')}}'); height: 400px; background-size: cover; background-position: center;">
        <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); height: 100%; display: flex; justify-content: center; align-items: center;">
          
        </div>
    </div>-->
   

    <div class="container container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                @yield('content')
            </div>
            <div class="col-md-4">
                @include('partials.sidebar', ['latestPosts' => $latestPosts ?? []])
            </div>
        </div>
    </div>

    @include('partials.footer')
</body>
</html>

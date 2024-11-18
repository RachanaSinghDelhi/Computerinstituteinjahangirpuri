<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Primary Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nice Computer Institute - Computer Institute in Jahangirpuri</title>
    <meta name="description" content="Nice Computer is one of the best since 2001 & courses offered are Grph. Design, Marg,Tally,Adv.Exl,Web & Digt.Mkt,Basic,C,C++,Python..">
    <meta name="keywords" content="computer institute in Jahangirpuri,nice computer insitute,computer institute in Delhi, computer institute in Rohini,computer center reviews, computer institute reviews,good review comments for institute, Computer institute in Jahangirpuri,computer institute near me, National computer institute Delhi, Delhi computer institute,computer institute shalimar bagh,computer institute certificate, Government computer institute in Delhi,nice computer institute">
    <link rel="icon" href="https://www.computerinstituteindelhijahangirpuri.com/assets/images/logo_new_icon_nice_computer_institute_jahangirpuri.png" type="image/x-icon">
    <link rel="canonical" href="https://www.computerinstituteindelhijahangirpuri.com" />

    <meta name="robots" content="index, follow" />

    <!-- Open Graph (OG) Meta Tags for Social Media -->
    <meta property="og:title" content="Computer Institute in Jahangirpuri">
    <meta property="og:description" content="Nice Computer Institute offers courses in Advanced Excel, Tally, Python, and Graphic Design. Located in Jahangirpuri, Delhi.">
    <meta property="og:url" content="https://www.computerinstituteindelhijahangirpuri.com/">
    <meta property="og:type" content="website">
    <meta property="og:image" content="http://www.computerinstituteindelhijahangirpuri.com/assets/images/manager_computer-institute-in-jahangirpuri.jpeg">
    <meta property="og:site_name" content="Nice Computer Institute">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Computer Institute in Jahangirpuri">
    <meta name="twitter:description" content="Enroll in Nice Computer Institute for IT courses in Advanced Excel, Tally, Python, and Webdesign Des....">
    <meta name="twitter:image" content="http://www.computerinstituteindelhijahangirpuri.com/assets/images/manager_computer-institute-in-jahangirpuri.jpeg">
    <meta name="twitter:site" content="@nicewebtechno">
    <meta name="google-site-verification" content="k_wn2HhZyY74S3ieDOBGbjRIaVSmTuNit2gClOSDbgU"/>
    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "EducationalOrganization",
          "name": "Nice Computer Institute",
          "url": "https://www.computerinstituteindelhijahangirpuri.com/",
          "logo": "http://www.computerinstituteindelhijahangirpuri.com/assets/images/manager_computer-institute-in-jahangirpuri.jpeg",
          "description": "Located in Jahangirpuri, Delhi, Nice Computer Institute provides courses in Advanced Excel, Tally, Python, Graphic Design, and more.",
          "sameAs": [
            "https://www.facebook.com/nicewebtechnologies",
            "https://x.com/nicewebtechno",
            "https://www.youtube.com/nicewebtechnologies",
            "https://www.instagram.com/nicewebtechnologies"
          ],
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "A1-9/10, A Block Rd, near Da Pizza Palace, Bhalswa Jahangirpuri",
            "addressLocality": "Jahangirpuri",
            "addressRegion": "Delhi",
            "postalCode": "110033",
            "addressCountry": "IN"
          },
          "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+91-9312945741",
            "contactType": "Customer Service"
          }
        }
    </script>

    <!-- CSS Links -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="{{ asset('assets/bootstrap5/bootstrap-5.0.2-dist/fonts/font.woff2') }}" rel="stylesheet">
</head>

<body>
    <!---topbar-->
    <div class="main-top" style="z-index: index 1000;">

    @include("partials.nav")
        <!--- navabr ends -->
       
        <!---crousel starts -->
        <!-- Banner section -->
         
    
    </header1>

<div class="banner" style="background-image: url('{{ asset('storage/' . $post->image) }}'); height: 400px; background-size: cover; background-position: center;">
        <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); height: 100%; display: flex; justify-content: center; align-items: center;">
           

<div class="container-fluid bg-breadcrumb">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                <li class="breadcrumb-item">
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                </li>
            @endforeach
        </ol>
    </nav>
</div>
</div>
</div>
    <!-- Main content -->


    <div class="container container-fluid py-5" >
    <div class="row" >
    <div class="col-md-8">
                @yield('content')
            </div>
            <div class="col-md-4">
                @include('partials.sidebar', ['latestPosts' => $latestPosts ?? []])
            </div>
</div>

</div>




    <!-- Footer -->
    @include('partials.footer')
    
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

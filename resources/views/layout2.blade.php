@include('partials.course_header')
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
   
        @yield('content') <!-- This is where your page-specific content will go -->
    
   

    @include('partials.sidebar')
</div>

</div>




    <!-- Footer -->
    @include('partials.footer')
</body>
</html>

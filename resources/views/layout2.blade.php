@include('partials.course_header')
<div class="banner" style="background-image: url('{{ asset('storage/' . $post->image) }}'); height: 400px; background-size: cover; background-position: center;">
        <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); height: 100%; display: flex; justify-content: center; align-items: center;">
            <h1 style="color: #fff;">{{ $post->post_title }}</h1>
        </div>
    </div>
    <!-- Main content -->
    <div class="container">
        @yield('content') <!-- This is where your page-specific content will go -->
    </div>

    <!-- Footer -->
    @include('partials.footer')
</body>
</html>

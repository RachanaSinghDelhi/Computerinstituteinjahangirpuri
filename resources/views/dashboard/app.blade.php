
    <header>
   @include('dashboard.dash_header', ['courses' => $courses]) <!-- Include your header Blade file -->
   <div class="banner" style="background-image: url('{{ asset('storage/' . $course->course_image) }}'); height: 400px; background-size: cover; background-position: center;">
        <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); height: 100%; display: flex; justify-content: center; align-items: center;">
            <h1 style="color: #fff;">{{ $course->course_title }}</h1>
        </div>
    </div>
</header>
    <main>
  @yield('content')
    </main>
    <footer>
  @include('partials.footer') <!-- Include your footer Blade file -->
</footer>
   
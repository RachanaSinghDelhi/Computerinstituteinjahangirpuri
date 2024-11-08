<header>
   @include('dashboard.dash_header') <!-- Corrected variable name -->
   <div class="banner" style="background-image: url('{{ asset('assets/images/Advance_excel_nice_computer_institute_jahangirpuri.jpg') }}'); height: 150px; background-size: cover; background-position: center;">
        <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); height: 100%; display: flex; justify-content: center; align-items: center;">
            <h1 style="color: #fff;">@yield('title')</h1>
        </div>
    </div>
</header>
<main>
   @yield('content')
</main>
<footer>
   @include('partials.footer') <!-- Include your footer Blade file -->
</footer>

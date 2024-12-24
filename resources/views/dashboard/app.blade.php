<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head Content -->
</head>
<body>
    <div class="d-flex flex-column min-vh-100">
        <header>
            @include('dashboard.dash_header')
            <div class="banner" style="background-image: url('{{ asset('assets/images/Advance_excel_nice_computer_institute_jahangirpuri.jpg') }}'); height: 150px; background-size: cover; background-position: center;">
                <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); height: 100%; display: flex; justify-content: center; align-items: center;">
                    <h1 style="color: #fff;">@yield('title')</h1>
                </div>
            </div>
        </header>

        <main class="flex-grow-1">
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    @stack('scripts')
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/bootstrap5/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>

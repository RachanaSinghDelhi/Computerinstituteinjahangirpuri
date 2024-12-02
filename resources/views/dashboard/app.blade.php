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

   @include('partials.footer') <!-- Include your footer Blade file -->

   @stack('scripts')
   <!-- Cropper.js JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/bootstrap5/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>-->
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
  


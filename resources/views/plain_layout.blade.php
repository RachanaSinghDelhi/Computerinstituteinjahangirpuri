@include('partials.login_header')
    <!-- Main content -->
    <div class="container">
        @yield('content') <!-- This is where your page-specific content will go -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/bootstrap5/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>-->
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
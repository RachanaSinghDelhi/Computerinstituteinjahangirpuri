<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Nice Computer Institute')</title>
    <link rel="icon" href="https://www.computerinstituteindelhijahangirpuri.com/assets/images/nice.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Cropper.js CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />

    <!-- DataTables Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

    @stack('styles')
</head>
<body class="d-flex flex-column" style="height: 100vh;">

    <!-- Wrapper to hold sidebar and content -->
    <div class="d-flex flex-grow-1">

        <!-- Sidebar -->
        @include('dashboard.sidebar')

        <!-- Main Content Area -->
        <div class="flex-grow-1 d-flex flex-column">

            <!-- Topbar -->
            @include('dashboard.topbar')

            <!-- Main Content -->
            <main class="container-fluid flex-grow-1 pt-4" style="margin-top: 50px; margin-left: 20px;">
                @yield('content')
            </main>

        </div>
    </div>

    <!-- Footer -->
    @include('dashboard.footer')

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

    @stack('scripts')
</body>
</html>

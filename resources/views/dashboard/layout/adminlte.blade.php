<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AdminLTE Styles -->
   

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('dashboard.layout.navbar')

        <!-- Sidebar -->
        @include('dashboard.layout.sidebar')

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid py-5">
                    @yield('content')
                </div>
            </section>
        </div>

        <!-- Footer -->
        @include('dashboard.layout.footer')

    </div>

    <!-- AdminLTE Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Add this inside the <head> or before </body> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>


  

<script>
    function loadNotifications() {
    $.ajax({
        url: "{{ route('notifications') }}",
        type: "GET",
        success: function (response) {
            $("#notificationCount").text(response.count);

            let notificationList = $("#notificationList");
            notificationList.empty();

            if (response.count > 0) {
                $("#notificationHeader").text("You have " + response.count + " pending approvals");

                response.notifications.forEach(function (notification) {
                    let iconClass = "fas fa-user-edit text-info"; // Default icon
                    let message = notification.message;

                    if (notification.type === "New Student Added") {
                        iconClass = "fas fa-user-plus text-success";
                    } else if (notification.type === "Batch Change") {
                        iconClass = "fas fa-users text-warning";
                    } else if (notification.type === "Student Update") {
                        iconClass = "fas fa-user-edit text-primary";
                    }

                    let item = `<a href="{{ route('super_admin.student-approvals') }}" class="dropdown-item">
                                    <i class="${iconClass}"></i> ${message}
                                    <span class="float-right text-muted text-sm">${notification.updated_at}</span>
                                </a>`;
                    notificationList.append(item);
                });
            } else {
                $("#notificationHeader").text("No New Notifications");
            }
        }
    });
}

// Load notifications every 10 seconds
setInterval(loadNotifications, 10000);
loadNotifications();

</script>

@stack('js')
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Teacher Dashboard')</title>

    <!-- Bootstrap & FontAwesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AdminLTE Styles -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('teacher.layout.navbar')

        <!-- Sidebar -->
        @include('teacher.layout.sidebar')

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid py-5">
                    @yield('content')
                </div>
            </section>
        </div>

        <!-- Footer -->
        @include('teacher.layout.footer')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    function loadNotifications() {
    $.ajax({
        url: "{{ route('teacher.notifications') }}",
        type: "GET",
        success: function (response) {
            console.log("Notifications Response:", response); // ✅ Debugging Line

            $("#notificationCount").text(response.count);

            let notificationList = $("#notificationList");
            notificationList.empty();

            if (response.count > 0) {
                $("#notificationHeader").text("You have " + response.count + " new notifications");

                response.notifications.forEach(function (notification) {
                    let iconClass = "fas fa-bell text-info"; // Default icon
                    let message = notification.data.message;

                    if (notification.type.includes("BatchChangeApproved")) {
                        iconClass = "fas fa-clock text-warning";
                    }

                    let item = `<a href="{{ route('teacher.notifications.index') }}" class="dropdown-item">
                                    <i class="${iconClass}"></i> ${message}
                                    <span class="float-right text-muted text-sm">${notification.created_at}</span>
                                </a>`;
                    notificationList.append(item);
                });

                // ✅ Show bell icon when notifications exist
                $("#notificationBell").addClass("text-danger");
            } else {
                $("#notificationHeader").text("No New Notifications");
                $("#notificationBell").removeClass("text-danger");
            }
        }
    });
}

// ✅ Call function every 10 seconds
setInterval(loadNotifications, 10000);
loadNotifications();

</script>


    @stack('js')
</body>
</html>

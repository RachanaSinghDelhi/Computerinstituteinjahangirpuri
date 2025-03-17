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
            $("#notificationCount").text(response.count);

            let notificationList = $("#notificationList");
            notificationList.empty();

            if (response.count > 0) {
                // Display first notification message in the header
                $("#notificationHeader").text(response.notifications[0].message);

                response.notifications.forEach(function (notification) {
                    let iconClass = "fas fa-bell text-info"; // Default icon

                    // Fix: Get the correct message
                    let message = notification.message;

                    // Fix: Convert timestamp to "5 minutes ago"
                    let timeAgo = moment(notification.created_at, "YYYY-MM-DD HH:mm:ss").fromNow();

                    if (notification.type && notification.type.includes("BatchChangeApproved")) {
                        iconClass = "fas fa-clock text-warning";
                    }

                    let item = `<a href="#" class="list-group-item list-group-item-action">
                                    <i class="${iconClass}"></i> ${message}
                                    <span class="float-right text-muted text-sm">${timeAgo}</span>
                                </a>`;
                    notificationList.append(item);
                });
            } else {
                $("#notificationHeader").text("No New Notifications");
            }
        },
        error: function () {
            console.error("Failed to load notifications.");
        }
    });
}




    // Mark notifications as read when dropdown is clicked
    $('#markasread').click(function () {
        $.ajax({
            url: "{{ route('teacher.notifications.markAsRead') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function () {
                $("#notificationCount").text("0");
            }
        });
    });

    // Load notifications every 10 seconds
    setInterval(loadNotifications, 10000);
    loadNotifications();
</script>



    @stack('js')
</body>
</html>

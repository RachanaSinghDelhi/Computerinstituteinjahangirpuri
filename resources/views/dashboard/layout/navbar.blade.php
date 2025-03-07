<nav class="main-header navbar navbar-expand navbar-dark bg-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Notification Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" id="notificationDropdown">
                <i class="fas fa-bell"></i>
                <span class="badge badge-danger" id="notificationCount">0</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header" id="notificationHeader">No New Notifications</span>
                <div class="dropdown-divider"></div>
                <div id="notificationList"></div>
                <div class="dropdown-divider"></div>
                <a href="{{ route('super_admin.student-approvals') }}" class="dropdown-item dropdown-footer">View All</a>
            </div>
        </li>

        <!-- Welcome Message -->
        <li class="nav-item d-flex align-items-center">
            <span class="nav-link">Welcome, {{ Auth::user()->name }}</span>
        </li>

        <!-- Logout Button -->
        <li class="nav-item">
            <a class="nav-link text-danger" href="{{ route('admin.logout') }}">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </li>
    </ul>
</nav>
@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

@endpush
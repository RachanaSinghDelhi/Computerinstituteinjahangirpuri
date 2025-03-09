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

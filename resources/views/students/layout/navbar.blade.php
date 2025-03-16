<nav class="main-header navbar navbar-expand navbar-dark bg-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Welcome Message -->
        <li class="nav-item d-flex align-items-center">
            <span class="nav-link">Welcome, {{ Auth::user()->name }}</span>
        </li>

        <!-- Logout Button -->
        <li class="nav-item">
            <a class="nav-link text-danger" href="{{ route('user.logout') }}">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
           
        </li>
    </ul>
</nav>

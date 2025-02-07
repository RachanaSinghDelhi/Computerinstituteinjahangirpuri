<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-dark text-white" id="sidebar" style="width: 250px; height: 100%; transition: all 0.3s;">
        <nav class="nav flex-column p-3">
            <a href="/" class="nav-link mb-3">
                <img src="{{ asset('assets/images/logo1_3D_half.png') }}" alt="Logo" width="150" style="margin-top:30px;">
            </a>
            <a href="{{ route('admin.students.index') }}" class="nav-link text-white">
                <i class="fa fa-graduation-cap"></i> <span>Dashboard</span>
            </a>

            <!-- Divider -->
            <hr class="text-white">

<!-- ToggleDown Menu for Students -->
<a href="#studentMenu" class="nav-link text-white" data-bs-toggle="collapse" aria-expanded="false" aria-controls="studentMenu">
    <i class="fa fa-users"></i> <span>Students</span>
    <i class="fa fa-chevron-down ms-2 arrow"></i>
</a>
<div class="collapse" id="studentMenu">
    <a href="{{ route('admin.students.add') }}" class="nav-link text-white ms-3">
        <i class="fa fa-user-plus"></i> <span>Add Student</span>
    </a>
    <a href="{{ route('admin.students.index') }}" class="nav-link text-white ms-3">
        <i class="fa fa-list"></i> <span>Student List</span>
    </a>
    <a href="{{ route('admin.students.id-cards') }}" class="nav-link text-white ms-3">
        <i class="fa fa-id-card"></i> <span>ID Cards</span>
    </a>
</div>

 <!-- Divider -->
 <hr class="text-white">

<!-- ToggleDown Menu for Fees -->
<a href="#feesMenu" class="nav-link text-white" data-bs-toggle="collapse" aria-expanded="false" aria-controls="feesMenu">
    <i class="fa fa-money"></i> <span>Fees</span>
    <i class="fa fa-chevron-down ms-2 arrow"></i>
</a>
<div class="collapse" id="feesMenu">
    <a href="{{ route('admin.fees.index') }}" class="nav-link text-white ms-3">
        <i class="fa fa-money-check"></i> <span>Fees</span>
    </a>
</div>






            <!-- Divider -->
            <hr class="text-white">

            <!-- ToggleDown Menu for Posts -->
            <a href="#postMenu" class="nav-link text-white" data-bs-toggle="collapse" aria-expanded="false" aria-controls="postMenu">
                <i class="fa fa-pencil"></i> <span>Posts</span>
                <i class="fa fa-chevron-down ms-2 arrow"></i>
            </a>
            <div class="collapse" id="postMenu">
                <a href="{{ route('admin.posts.create_post') }}" class="nav-link text-white ms-3">
                    <i class="fa fa-plus"></i> <span>Add Post</span>
                </a>
                <a href="{{ route('admin.posts.new_posts') }}" class="nav-link text-white ms-3">
                    <i class="fa fa-list"></i> <span>Post List</span>
                </a>
            </div>

            

      

            <!-- Divider -->
            <hr class="text-white">

            <!-- ToggleDown Menu for Certificates -->
            <a href="#certificateMenu" class="nav-link text-white" data-bs-toggle="collapse" aria-expanded="false" aria-controls="certificateMenu">
                <i class="fa fa-certificate"></i> <span>Certificates</span>
                <i class="fa fa-chevron-down ms-2 arrow"></i>
            </a>
            <div class="collapse" id="certificateMenu">
                <a href="{{ route('certificates.index') }}" class="nav-link text-white ms-3">
                    <i class="fa fa-certificate"></i> <span>Certificates</span>
                </a>
                <a href="{{ route('certificates.select') }}" class="nav-link text-white ms-3">
                    <i class="fa fa-check"></i> <span>Select Certificates</span>
                </a>
            </div>



 


            <!-- Logout Form -->
            <form action="{{ route('logout') }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Logout</button>
            </form>
        </nav>
    </div>

    <!-- Content Wrapper -->
    <div id="page-content-wrapper">
        <!-- Toggle Button -->
        <button id="toggleSidebar" class="btn btn-secondary position-fixed" style="top: 20px; left: 20px; z-index: 10;">
            <i class="fa fa-bars"></i>
        </button>
        
        <!-- Main content goes here -->
        <div class="container-fluid">
            <!-- Your content here -->
        </div>
    </div>
</div>

<!-- jQuery Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   $(document).ready(function() {
    // Initially collapse the sidebar on page load
    $('#sidebar').addClass('active');
    $('#page-content-wrapper').addClass('active'); // Move content to the left initially

    // Handle the sidebar toggle
    $('#toggleSidebar').click(function(event) {
        event.stopPropagation(); // Prevent the click from propagating to the document
        $('#sidebar').toggleClass('active');
        $('#page-content-wrapper').toggleClass('active');
    });

    // Close sidebar if clicking outside of it
    $(document).click(function(event) {
        if (!$(event.target).closest('#sidebar, #toggleSidebar').length) {
            $('#sidebar').addClass('active'); // Hide sidebar
            $('#page-content-wrapper').addClass('active');
        }
    });

    // Handle the toggle-down functionality for submenus
    $('.nav-link[data-bs-toggle="collapse"]').on('click', function(e) {
        var targetMenu = $($(this).attr('href'));
        var arrowIcon = $(this).find('.arrow');

        // Close all other open menus
        $('.collapse.show').not(targetMenu).collapse('hide');
        $('.nav-link[data-bs-toggle="collapse"] .arrow').not(arrowIcon).removeClass('fa-chevron-up').addClass('fa-chevron-down');

        // Toggle the clicked menu
        targetMenu.collapse('toggle');

        // Toggle the arrow icon for the current menu
        if (targetMenu.hasClass('show')) {
            arrowIcon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
        } else {
            arrowIcon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
        }
    });
});

</script>

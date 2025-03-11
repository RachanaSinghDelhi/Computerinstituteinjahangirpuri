
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('index') }}" class="brand-link d-flex align-items-center">
    <img src="{{ asset('assets/images/logo_3D_half.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
    <div class="d-flex flex-column ms-2">
        <span class="brand-text ">Nice Web</span>
        <span class="brand-text font-weight-light">Technologies</span>
    </div>
</a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
<li class="nav-header">TEACHER'S WORKSPACE</li>



<li class="nav-item">
    <a href="{{ route('teacher.dashboard') }}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>

   <!-- Students -->
   <li class="nav-header">MANAGE STUDENTS</li> 
   <li class="nav-item has-treeview">
       <a href="#" class="nav-link">
           <i class="nav-icon fas fa-user-graduate"></i>
           <p>Students<i class="right fas fa-angle-left"></i></p>
       </a>
       <ul class="nav nav-treeview">
           <li class="nav-item">
               <a href="{{ route('teacher.students.add') }}" class="nav-link">
                   <i class="fas fa-plus-circle nav-icon"></i>
                   <p>Add Student</p>
               </a>
           </li>
           
           <li class="nav-item">
               <a href="{{ route('teacher.students.index') }}" class="nav-link">
                   <i class="fas fa-list nav-icon"></i>
                   <p>Student List</p>
               </a>
           </li>
           
       </ul>
   </li>
   <li class="nav-header">MANAGE FEES</li> 
   <li class="nav-item has-treeview">
       <a href="#" class="nav-link">
           <i class="nav-icon fas fa-money-bill-alt"></i>
           <p>Fee List<i class="right fas fa-angle-left"></i></p>
       </a>
       <ul class="nav nav-treeview">
           
           <li class="nav-item">
               <a href="{{ route('teacher.fees.index') }}" class="nav-link">
                   <i class="fas fa-list nav-icon"></i>
                   <p>Fee List</p>
               </a>
           </li>
           
       </ul>
   </li>
   <li class="nav-header">MANAGE ATTENDANCE</li> 
   <li class="nav-item has-treeview">
       <a href="#" class="nav-link">
           <i class="nav-icon far fa-calendar-check"></i>
           <p>Attendance<i class="right fas fa-angle-left"></i></p>
       </a>
       <ul class="nav nav-treeview">
           
           <li class="nav-item">
               <a href="{{ route('teacher.attendance.index') }}" class="nav-link">
                   <i class="fas fa-list nav-icon"></i>
                   <p>Attendance List</p>
               </a>
           </li>
           <li class="nav-item">
               <a href="{{ route('attendance.batchwiseReport') }}" class="nav-link">
                   <i class="fas fa-list nav-icon"></i>
                   <p>Attendance Report</p>
               </a>
           </li>
           
       </ul>
   </li>



   <li class="nav-header">MANAGE ASSIGNMENTS</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tasks"></i>
        <p>Assignments<i class="right fas fa-angle-left"></i></p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('teacher.assignments.add') }}" class="nav-link">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Assignment</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('teacher.assignments.index') }}" class="nav-link">
                <i class="fas fa-list nav-icon"></i>
                <p>Assignment List</p>
            </a>
        </li>
    </ul>
</li>





<!-- Logout -->
<li class="nav-item">
    <a href="{{ route('user.logout') }}" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>Logout</p>
    </a>
</li>
</ul>
</nav>
</div>
</aside>
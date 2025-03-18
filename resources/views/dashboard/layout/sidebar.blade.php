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
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Courses (Super User Only) -->
                @if(Auth::check() && Auth::user()->role === 'super_admin')
                <li class="nav-header">MANAGE COURSES</li> 
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Courses<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('course.create') }}" class="nav-link">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add Course</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('course.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Course List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Posts (Super User & Admin) -->
                @if(Auth::check() && in_array(Auth::user()->role, ['super_admin']))
                <li class="nav-header">MANAGE POSTS</li> 
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Posts<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('posts.create_post') }}" class="nav-link">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('posts.new_posts') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Post List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Students -->
                <li class="nav-header">MANAGE STUDENTS</li> 
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Students<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('students.create') }}" class="nav-link">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add Student</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('super_admin.student-approvals') }}" class="nav-link">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Approve Student</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('student.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Ajax Student</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('students.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Student List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('students.id-cards') }}" class="nav-link">
                                <i class="fas fa-id-card nav-icon"></i>
                                <p>ID Cards</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Fees -->
                <li class="nav-header">MANAGE FEES</li> 
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>Fees<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('fees.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Fees</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('receipts.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Receipts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('approve.fees.index') }}" class="nav-link">
                            <i class="fas fa-list nav-icon"></i>
                                <p>Approve Fees</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('fees.received') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Fees Received</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('fees.pending') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Fees Pending</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('list.payments') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Manage Payments</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-header">MANAGE CERTIFICATES</li> 
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-certificate"></i>
                        <p>Certificates<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('certificates.index') }}" class="nav-link">
                            <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Certificates List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('certificates.select') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>PDF Certificate</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if(Auth::check() && Auth::user()->role === 'super_admin')
                <li class="nav-header">MANAGE EXPENSES</li> 
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                       <i class="nav-icon fas fa-money-check-alt"></i>  
                        <p>Expenses
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('superadmin.expenses.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Manage Expenses</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('superadmin.expenses.create') }}" class="nav-link">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add Expenses</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(Auth::check() && Auth::user()->role === 'super_admin')
                <li class="nav-header">MANAGE USERS</li> 
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-cog"></i>
                        <p>USERS 
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Users List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.create') }}" class="nav-link">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('students.addActive') }}" class="nav-link">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Add Active Students</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif




                <!-- Logout -->
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

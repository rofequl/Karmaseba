<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('framework/adminLTE/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Karmaseba</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('framework/adminLTE/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Services Provider
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('spApprove')}}" class="nav-link">
                                <i class="fas fa-user-check nav-icon"></i>
                                <p>Approval</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('spNotApprove')}}" class="nav-link">
                                <i class="fas fa-user-times nav-icon"></i>
                                <p>Not Approval</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Category Management
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.category')}}" class="nav-link">
                                <p>Service Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.subcategory')}}" class="nav-link">
                                <p>Service Subcategory</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.category3')}}" class="nav-link">
                                <p>Category Layer 3</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.category4')}}" class="nav-link">
                                <p>Category Layer 4</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.servicePanel')}}" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard"></i>
                        <p>
                            Service Panel
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('termsCondition')}}" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard"></i>
                        <p>
                            Terms & Conditions
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('announcement')}}" class="nav-link">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            Announcement
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('AdminSpHelp')}}" class="nav-link">
                        <i class="nav-icon fas fa-hands-helping"></i>
                        <p>
                            Help
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('AdminLogout')}}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
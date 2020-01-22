<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admins/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Getting Room</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admins/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Sahin mahamud</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            LINK
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ request()->is('admin/listings*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/listings*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Listings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('listings.needrooms') }}" class="nav-link {{ request()->is('admin/listings/needrooms*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Need Rooms</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('listings.offerrooms') }}" class="nav-link {{ request()->is('admin/listings/offerrooms*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Offer Rooms</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('listings.needapartments') }}" class="nav-link {{ request()->is('admin/listings/needapartments*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Need Apartments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('listings.offerapartments') }}" class="nav-link {{ request()->is('admin/listings/offerapartments*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Offer Apartments</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">SUBSCRIPTIONS</li>
                <li class="nav-item">
                    <a href="{{ route('plan') }}" class="nav-link {{ request()->is('admin/plans*') ? 'active' : '' }}">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Plans
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subscriptions.all') }}" class="nav-link {{ request()->is('admin/subscriptions*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-business-time"></i>
                        <p>
                            Subscriptions
                        </p>
                    </a>
                </li>
                <li class="nav-header">Users and Admins Management</li>
                <li class="nav-item">
                    <a href="{{ route('admin.admins.all') }}" class="nav-link {{ request()->is('admin/admins*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Admins
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.all') }}" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('admins.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
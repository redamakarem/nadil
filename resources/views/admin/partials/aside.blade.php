<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('admin-lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Nadil</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                @if(auth()->check())
                    <a href="#" class="d-block">{{auth()->user()->name}}</a>
                @endif
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.users.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.roles.index')}}" class="nav-link">
                        <i class="fas fa-shield-alt"></i>
                        <p>
                            Roles

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.permissions.index')}}" class="nav-link">
                        <i class="fas fa-shield-alt"></i>
                        <p>
                            Permissions

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.areas.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-map"></i>
                        <p>
                            Areas

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.restaurants.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>
                            Branches

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.bookings.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Bookings

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.contact-messages.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Messages

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.cuisines.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Cuisines

                        </p>
                    </a>
                </li>
                @role('super-admin')
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <a href="#" class="nav-link" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>
                                Logout
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </form>
                </li>
                @endrole

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

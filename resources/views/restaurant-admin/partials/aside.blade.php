<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('admin-lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
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
                    <a href="{{route('restaurant-admin.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('restaurant-admin.restaurants.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Restaurants
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('restaurant-admin.bookings')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Bookings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('restaurant-admin.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Menus
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('restaurant-admin.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>

                    @if(session('impersonated_by'))
                    <li class="nav-item">
                        <a href="{{route('users.leave-impersonate')}}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                End Impersonation
                            </p>
                        </a>
                    </li>
                    @endif

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






            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

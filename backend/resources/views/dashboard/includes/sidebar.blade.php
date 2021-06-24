<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard.main')}}" class="brand-link">
        <img src="{{asset('dashboard/assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
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
                    <a href="{{route('dashboard.main')}}"
                       class="nav-link {{request()->routeIs('dashboard.main')?'active':''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @can('browse category')
                <li class="nav-item">
                    <a href="{{route('dashboard.categories.index')}}"
                       class="nav-link {{request()->routeIs('dashboard.categories.index')?'active':''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                @endcan
                @can('browse admin')
                <li class="nav-item">
                    <a href="{{route('dashboard.admins.index')}}"
                       class="nav-link {{request()->routeIs('dashboard.admins.index')?'active':''}}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Admins
                        </p>
                    </a>
                </li>
                @endcan
                @can('browse role')
                <li class="nav-item">
                    <a href="{{route('dashboard.roles.index')}}"
                       class="nav-link {{request()->routeIs('dashboard.roles.index')?'active':''}}">
                        <i class="nav-icon fas fa-robot"></i>
                        <p>
                            Roles
                        </p>
                    </a>
                </li>
                @endcan
                @can('browse user')
                <li class="nav-item">
                    <a href="{{route('dashboard.users.index')}}"
                       class="nav-link {{request()->routeIs('dashboard.users.index')?'active':''}}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                @endcan
                @can('browse news')
                    <li class="nav-item">
                        <a href="{{route('dashboard.news.index')}}"
                           class="nav-link {{request()->routeIs('dashboard.news.index')?'active':''}}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                News
                            </p>
                        </a>
                    </li>
                @endcan
                @can('browse product')
                    <li class="nav-item">
                        <a href="{{route('dashboard.products.index')}}"
                           class="nav-link {{request()->routeIs('dashboard.products.index')?'active':''}}">
                            <i class="nav-icon fas fa-box"></i>
                            <p>
                                Products
                            </p>
                        </a>
                    </li>
                @endcan
                @can('browse form')
                    <li class="nav-item">
                        <a href="{{route('dashboard.forms.index')}}"
                           class="nav-link {{request()->routeIs('dashboard.forms.index')?'active':''}}">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Forms
                            </p>
                        </a>
                    </li>
                @endcan
                @can('browse document')
                    <li class="nav-item">
                        <a href="{{route('dashboard.documents.index')}}"
                           class="nav-link {{request()->routeIs('dashboard.documents.index')?'active':''}}">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Documents
                            </p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
@section('script')
    <script>
        $('li > a').click(function(){
            // If this isn't already active
            if (!$(this).hasClass("active")) {
                // Remove the class from anything that is active
                $("li>a.active").removeClass("active");
                // And make this active
                $(this).addClass("active");
            }
        });
    </script>

@endsection

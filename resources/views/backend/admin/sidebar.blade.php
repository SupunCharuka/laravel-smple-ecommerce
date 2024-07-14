<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('/') }}" class="brand-link">
        <img src="{{ asset(Auth::user()->profile_photo_url) }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::user()->getRoleNames()->first() }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @can('category.manage')
                    <li class="nav-item">
                        <a href="{{ route('admin.category') }}"
                            class="nav-link {{ Route::is('admin.category') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Category
                            </p>
                        </a>
                    </li>
                @endcan
                @can('product.create')
                    <li class="nav-item">
                        <a href="{{ route('admin.product') }}"
                            class="nav-link {{ Route::is('admin.product') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Add-Product
                            </p>
                        </a>
                    </li>
                @endcan

                @can('product.manage')
                    <li class="nav-item">
                        <a href="{{ route('admin.productsManage') }}"
                            class="nav-link {{ Route::is('admin.productsManage') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Manage-Product
                            </p>
                        </a>
                    </li>
                @endcan

                @can('orders.manage')
                    <li class="nav-item">
                        <a href="{{ route('admin.manageOrders') }}"
                            class="nav-link {{ Route::is('admin.manageOrders') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Manage-Orders
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

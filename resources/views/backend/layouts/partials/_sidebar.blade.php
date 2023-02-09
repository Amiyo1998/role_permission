 <!-- sidebar menu area start -->
 @php
      $usr = Auth::guard('admin')->user();
 @endphp
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard')}}"><img src="{{ asset('backend/images/icon/logo3.png')}}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    @if ($usr->can('dashboard.view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active': '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif
                    @if ($usr->can('role.view') || $usr->can('role.create') || $usr->can('role.edit') || $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Roles & Permissions</span></a>
                        <ul class="collapse {{ Route::is('roles.create') || Route::is('roles.index') || Route::is('roles.edit') || Route::is('roles.show') ? 'in':'' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('roles.index') || Route::is('roles.edit') ? 'active':'' }}"><a href="{{ route('roles.index')}}">All Role </a></li>
                            @endif
                            @if ($usr->can('role.create'))
                                <li class="{{ Route::is('roles.create') ? 'active':'' }}"><a href="{{ route('roles.create')}}">Create Roles</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('admin.view') || $usr->can('admin.create') || $usr->can('admin.edit') || $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>Admins</span></a>
                        <ul class="collapse {{ Route::is('admins.create') || Route::is('admins.index') || Route::is('admins.edit') || Route::is('admins.show') ? 'in':'' }}">
                            @if ($usr->can('admin.view'))
                            <li class="{{ Route::is('admins.index') || Route::is('admins.edit') ? 'active':'' }}"><a href="{{ route('admins.index')}}">All Admin </a></li>
                            @endif
                            @if ($usr->can('admin.create'))
                            <li class="{{ Route::is('admins.create') ? 'active':'' }}"><a href="{{ route('admins.create')}}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if ($usr->can('blog.view') || $usr->can('blog.create') || $usr->can('blog.edit') || $usr->can('blog.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>blogs</span></a>
                        <ul class="collapse {{ Route::is('blogs.create') || Route::is('blogs.index') || Route::is('blogs.edit') || Route::is('blogs.show') ? 'in':'' }}">
                            @if ($usr->can('blog.view'))
                            <li class="{{ Route::is('blogs.index') || Route::is('blogs.edit') ? 'active':'' }}"><a href="{{ route('blogs.index')}}">All Blog</a></li>
                            @endif
                            @if ($usr->can('blog.create'))
                            <li class="{{ Route::is('blogs.create') ? 'active':'' }}"><a href="{{ route('blogs.create')}}">Create Blog</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->

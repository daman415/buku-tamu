<ul class="sidebar-menu">

    <li class="menu-header">Dashboard</li>
    <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fa fa-fire"></i> <span>Dashboard</span></a></li>
    <li class="menu-header">Data Master</li>
    <li class="{{ (request()->is('admin/pengunjung*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('pengunjung.index') }}"><i class="fa fa-user"></i> <span>Pengunjung</span></a></li>
    <li class="{{ (request()->is('admin/user*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('user.index') }}"><i class="fa fa-user"></i> <span>User</span></a></li>


</ul>

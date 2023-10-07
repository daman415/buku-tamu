<ul class="sidebar-menu">

    <li class="menu-header">Dashboard</li>
    <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}"><a class="nav-link" href=""><i class="fa fa-fire"></i> <span>Dashboard</span></a></li>
    <li class="menu-header">Data Master</li>
    <li class="{{ (request()->is('admin/pengunjung*')) ? 'active' : '' }}"><a class="nav-link" href=""><i class="fa fa-user"></i> <span>Pengunjung</span></a></li>


</ul>

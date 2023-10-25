<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">Cybernetworks</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pages
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fa fa-user"></i>
            <span>Manage Users</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('roles.index') }}">
            <i class="fa fa-lock"></i>
            <span>Manage Roles</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('setting-email-config') }}">
            <i class="fa fa-cog"></i>
            <span>Env Configuration</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('setting-email-test') }}">
            <i class="fa fa-cog"></i>
            <span>Test Email</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

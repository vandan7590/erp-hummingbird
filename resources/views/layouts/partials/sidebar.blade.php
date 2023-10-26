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

    <!-- Nav Item - Pages Collapse Menu -->
    <li
        class="nav-item {{ request()->is('pages*') || request()->is('pages/users*') || request()->is('pages/roles*') ? 'active menu-open' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fa fa-user"></i>
            <span>Users</span>
        </a>
        <div id="collapsePages"
            class="collapse {{ request()->is('pages/users*') || request()->is('pages/roles*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Management</h6>
                <a class="collapse-item {{ request()->is('pages/users*') ? 'active' : '' }}"
                    href="{{ route('users.index') }}">Manage Users</a>
                <a class="collapse-item {{ request()->is('pages/roles*') ? 'active' : '' }}"
                    href="{{ route('roles.index') }}">Manage Roles</a>
            </div>
        </div>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Configuration
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li
        class="nav-item {{ request()->is('configuration*') || request()->is('configuration/email-config*') || request()->is('configuration/email-test*') ? 'active menu-open' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConfigs"
            aria-expanded="true" aria-controls="collapseConfigs">
            <i class="fas fa-tools"></i>
            <span>Setup</span>
        </a>
        <div id="collapseConfigs"
            class="collapse {{ request()->is('configuration/email-config*') || request()->is('configuration/email-test*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Site Info</h6>
                <a class="collapse-item {{ request()->is('configuration/email-config*') ? 'active' : '' }}"
                    href="{{ route('setting-email-config') }}">Env Configuration</a>
                <a class="collapse-item {{ request()->is('configuration/email-test*') ? 'active' : '' }}"
                    href="{{ route('setting-email-test') }}">Email Testing</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

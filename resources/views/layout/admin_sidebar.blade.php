<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Library <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administrator
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin"
            aria-expanded="true" aria-controls="collapseAdmin">
            <i class="fas fa-fw fa-cog"></i>
            <span>Administrator</span>
        </a>
        <div id="collapseAdmin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">Pengguna</a>
            </div>
        </div>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">
        Buku
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBuku"
            aria-expanded="true" aria-controls="collapseBuku">
            <i class="fas fa-fw fa-cog"></i>
            <span>Buku</span>
        </a>
        <div id="collapseBuku" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('penulis_index') }}">Penulis</a>
                <a class="collapse-item" href="{{ route('buku_index') }}">Buku</a>
            </div>
        </div>
    </li>

</ul>
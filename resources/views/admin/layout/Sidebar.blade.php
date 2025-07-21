<!-- Sidebar -->
    <ul class="navbar-nav bg-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('img/logo/w-car.png') }}" alt="RGB Transport Logo" class="sidebar-logo">
            </div>
            <div class="sidebar-brand-text mx-2">RGB Transport</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ request()->is('admin/dashboard') ? '#' : '/admin/dashboard' }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Surat Jalan
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->is('admin/data/*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetupData"
                aria-expanded="true" aria-controls="collapseSetupData">
                <i class="fas fa-fw fa-folder"></i>
                <span>Setup Data</span>
            </a>
            <div id="collapseSetupData" class="collapse {{ request()->is('admin/data/*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Setup Data:</h6>
                    <a class="collapse-item {{ request()->is('admin/data/petugas') ? 'active bg-dark text-white' : '' }}" href="/admin/data/petugas">Data Petugas</a>
                    <a class="collapse-item {{ request()->is('admin/data/pelanggan') ? 'active bg-dark text-white' : '' }}" href="/admin/data/pelanggan">Data Pelanggan</a>
                    <a class="collapse-item {{ request()->is('admin/data/hargaAngkut') ? 'active bg-dark text-white' : '' }}" href="/admin/data/hargaAngkut">Data Harga Angkut</a>
                    <a class="collapse-item {{ request()->is('admin/data/kendaraan') ? 'active bg-dark text-white' : '' }}" href="/admin/data/kendaraan">Data Kendaraan</a>
                    <hr class="sidebar-divider my-1">
                    <a class="collapse-item {{ request()->is('admin/data/riwayat') ? 'active bg-dark text-white' : '' }}" href="/admin/data/riwayat">Riwayat</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Orderan
        </div>

        <!-- Nav Item - Pemesanan -->
        <li class="nav-item {{ request()->is('admin/pemesanan') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.pemesanan.index') }}">
                <i class="fas fa-fw fa-shipping-fast"></i>
                <span>Pemesanan</span>
            </a>
        </li>

        <!-- Nav Item - Tracking -->
        <li class="nav-item {{ request()->is('admin/tracking') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.tracking.index') }}">
                <i class="fas fa-fw fa-map-marked-alt"></i>
                <span>Tracking</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Lainnya
        </div>
        
        <!-- Nav Item - Pesan -->
        <li class="nav-item {{ request()->is('admin/pesan') ? 'active' : '' }}" >
            <a class="nav-link {{ request()->is('admin/pesan') ? '' : '' }}" href="/admin/pesan">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Pesan</span></a>
        </li>

        <!-- Nav Item - Testimoni -->
        <li class="nav-item {{ request()->is('admin/testimoni') ? 'active' : '' }}" >
            <a class="nav-link {{ request()->is('admin/testimoni') ? '' : '' }}" href="/admin/testimoni">
                <i class="fas fa-fw fa-comments"></i>
                <span>Testimoni</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded border-0" id="sidebarToggle"></button>
        </div>

    </ul>
<!-- End of Sidebar -->
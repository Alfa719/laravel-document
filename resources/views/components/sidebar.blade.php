<ul class="navbar-nav sidebar sidebar-dark accordion px-2" id="accordionSidebar" style="background: #0c1230;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mb-2 rounded" style="background: ">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('asset/img/admin') . '/' . Auth::user()->image }}" alt="" height="50" width="50"
                class="rounded-circle">
        </div>
        <div class="sidebar-brand-text mx-3 text-capitalize">{{ Auth::user()->name }}</div>
    </a>

    <!-- Divider -->

    <!-- Nav Item - Dashboard -->
    <li class=" nav-item"
        style="{{ request()->path() == 'admin' || request()->path() == 'home' ? 'background: rgb(0, 255, 234); border-radius: 10px;' : '' }}">
        <a class="nav-link" href="{{ route('admin.index') }}"
            style="{{ request()->path() == 'admin' || request()->path() == 'home' ? 'color:black' : '' }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Pengelolaan Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item"
        style=" {{ request()->path() == 'admin/data-dosen' ? 'background: rgb(0, 255, 234); border-radius: 10px' : '' }}">
        <a class="nav-link" href="{{ route('admin.dosen') }}"
            style="{{ request()->path() == 'admin/data-dosen' ? 'color:black' : '' }}">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Dosen</span>
        </a>
    </li>
    <li class="nav-item"
        style=" {{ request()->path() == 'admin/data-mahasiswa' ? 'background: rgb(0, 255, 234); border-radius: 10px' : '' }}">
        <a class="nav-link" href="{{ route('admin.mahasiswa') }}"
            style="{{ request()->path() == 'admin/data-mahasiswa' ? 'color:black' : '' }}">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Mahasiswa</span>
        </a>
    </li>
    <li class="nav-item"
        style=" {{ request()->path() == 'admin/data-product' ? 'background: rgb(0, 255, 234); border-radius: 10px' : '' }}">
        <a class="nav-link" href="{{ route('admin.product') }}"
            style="{{ request()->path() == 'admin/data-product' ? 'color:black' : '' }}">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Produk</span>
        </a>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">
        Pengelolaan Fitur
    </div>
    <li class="nav-item"
        style=" {{ request()->path() == 'admin/verify-product' ? 'background: rgb(0, 255, 234); border-radius: 10px' : '' }}">
        <a class="nav-link" href="{{ route('admin.verify-product') }}"
            style="{{ request()->path() == 'admin/verify-product' ? 'color:black' : '' }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Verifikasi Produk</span><span class="badge badge-light ml-1 px-2">{{ $span }}</span>
        </a>
    </li>
    <li class="nav-item"
        style=" {{ request()->path() == 'admin/type-product' ? 'background: rgb(0, 255, 234); border-radius: 10px' : '' }}">
        <a class="nav-link" href="{{ route('admin.type') }}"
            style="{{ request()->path() == 'admin/type-product' ? 'color:black' : '' }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Kelola Tipe Produk</span>
        </a>
    </li>
    <li class="nav-item"
        style=" {{ request()->path() == 'admin/program-study' ? 'background: rgb(0, 255, 234); border-radius: 10px' : '' }}">
        <a class="nav-link" href="{{ route('admin.prodi') }}"
            style="{{ request()->path() == 'admin/program-study' ? 'color:black' : '' }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Kelola Program Studi</span>
        </a>
    </li>
    <div class="sidebar-heading">
        Profil
    </div>
    <li class="nav-item"
        style=" {{ request()->path() == 'admin/profile' ? 'background: rgb(0, 255, 234); border-radius: 10px' : '' }}">
        <a class="nav-link" href="{{ route('admin.profile') }}"
            style="{{ request()->path() == 'admin/profile' ? 'color:black' : '' }}">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Pengaturan Profil</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
</ul>

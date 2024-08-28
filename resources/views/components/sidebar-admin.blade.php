<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <br>
        {{-- <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('img/SMK.png') }}" style="height: 70px"
                    alt="SMKN 01 SEMPARUK"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('img/SMK.png') }}" alt="SMKN 01 SEMPARUK"
                    class="img-fluid" style="max-width: 90px; max-height: 40px;"></a>
        </div> --}}
        <ul class="sidebar-menu">
            <li class="menu-header">Beranda</li>
            <li class='{{ Request::is('admin/dashboard') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Menu Utama</li>
            <li class="nav-item dropdown {{ Request::is('admin/kelola-wisata*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-graduate"></i>
                    <span>Kelola Wisata</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/kelola-wisata/kategori') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kelola-wisata.kategori.index') }}">Kategori</a>
                    </li>
                    <li class="{{ Request::is('admin/kelola-wisata/destination') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kelola-wisata.destination.index') }}">Tempat
                            Wisata</a>
                    </li>
                </ul>
            </li>

            <li class='{{ Request::is('admin/favorite/data') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ route('admin.favorite.index') }}">
                    <i class="fas fa-home"></i>
                    <span>Favorite</span>
                </a>
            </li>

            <li class='{{ Request::is('admin/reviews/data') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ route('admin.reviews.index') }}">
                    <i class="fas fa-home"></i>
                    <span>Reviews</span>
                </a>
            </li>
        </ul>
    </aside>
</div>

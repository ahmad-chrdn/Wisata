<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('kepala_sekolah.dashboard') }}"><img src="{{ asset('img/SMK.png') }}" style="height: 70px"
                    alt="SMKN 01 SEMPARUK"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('kepala_sekolah.dashboard') }}"><img src="{{ asset('img/SMK.png') }}" alt="SMKN 01 SEMPARUK"
                    class="img-fluid" style="max-width: 90px; max-height: 40px;"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Beranda</li>
            <li class='{{ Request::is('kepala_sekolah/dashboard') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ route('kepala_sekolah.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Menu Utama</li>
            <li class="nav-item dropdown {{ Request::is('kepala_sekolah/kelola-siswa*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-friends"></i>
                    <span>Kelola Siswa</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('kepala_sekolah/kelola-siswa/presensi') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('kepala_sekolah.kelola-siswa.presensi.index') }}">Data
                            Presensi Siswa</a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('kepala_sekolah/kelola-siswa/bermasalah') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('kepala_sekolah.kelola-siswa.bermasalah.index') }}">Data
                            Siswa Bermasalah</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>

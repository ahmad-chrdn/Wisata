<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}"><img
                    src="https://diskominfo.pontianak.go.id/storage/settings/June2021/8bV8aTsUu4xvWqdyZdrA.png"
                    style="height: 42px" alt="Diskominfo Kota Pontianak"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}"><img
                    src="https://diskominfo.pontianak.go.id/storage/users/April2020/g92BskjkRdyLpnMNEGqR.png"
                    alt="Diskominfo Kota Pontianak" class="img-fluid" style="max-width: 43px; max-height: 43px;"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Beranda</li>
            <li class='{{ Request::is('admin/dashboard') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Menu Utama</li>
            <li class="nav-item dropdown {{ Request::is('admin/kepala-sekolah*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-friends"></i>
                    <span>Kelola Kepala Sekolah</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/kepala-sekolah/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kepala-sekolah.create') }}">Buat Akun</a>
                    </li>
                    <li class="{{ Request::is('admin/kepala-sekolah/data') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kepala-sekolah.index') }}">Data Kepala Sekolah</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/guru-bk*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-friends"></i>
                    <span>Kelola Guru Bk</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/guru-bk/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.guru-bk.create') }}">Buat Akun</a>
                    </li>
                    <li class="{{ Request::is('admin/guru-bk/data') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.guru-bk.index') }}">Data Guru Bk</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/wali-kelas*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-friends"></i>
                    <span>Kelola Wali Kelas</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/wali-kelas/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.wali-kelas.create') }}">Buat Akun</a>
                    </li>
                    <li class="{{ Request::is('admin/wali-kelas/data') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.wali-kelas.index') }}">Data Wali Kelas</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/pegawai*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-friends"></i>
                    <span>Kelola Akademik</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/pegawai/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.pegawai.create') }}">Data Kelas</a>
                    </li>
                    <li class="{{ Request::is('admin/pegawai/data') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.pegawai.index') }}">Data Semester</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/pegawai*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-friends"></i>
                    <span>Kelola Siswa</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/pegawai/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.pegawai.create') }}">Buat Siswa</a>
                    </li>
                    <li class="{{ Request::is('admin/pegawai/data') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.pegawai.index') }}">Data Presensi Siswa</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/pegawai*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-friends"></i>
                    <span>Rekapitulasi</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/pegawai/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.pegawai.create') }}">Kelas x</a>
                    </li>
                    <li class="{{ Request::is('admin/pegawai/data') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.pegawai.index') }}">Kelas XI</a>
                    </li>
                </ul>
            </li>

            <li class='{{ Request::is('admin/pangkat') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ route('admin.pangkat.index') }}">
                    <i class="fas fa-star"></i>
                    <span>Pangkat</span>
                </a>
            </li>

            <li class='{{ Request::is('admin/jabatan') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ route('admin.jabatan.index') }}">
                    <i class="fas fa-briefcase"></i>
                    <span>Jabatan</span>
                </a>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/pegawai*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-friends"></i>
                    <span>Pegawai</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/pegawai/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.pegawai.create') }}">Tambah Pegawai</a>
                    </li>
                    <li class="{{ Request::is('admin/pegawai/data') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.pegawai.index') }}">Data Pegawai</a>
                    </li>
                    <li class='{{ Request::is('admin/pegawai/duk') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('admin.duk.index') }}">Naik Pangkat</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>

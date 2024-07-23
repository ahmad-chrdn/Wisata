<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('guru_piket.dashboard') }}"><img src="{{ asset('img/TUT WURI HANDAYANI.png') }}"
                    style="height: 90px" alt="SMKN 01 SEMPARUK"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('guru_piket.dashboard') }}"><img src="{{ asset('img/TUT WURI HANDAYANI.png') }}"
                    alt="SMKN 01 SEMPARUK" class="img-fluid" style="max-width: 90px; max-height: 90px;"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Beranda</li>
            <li class='{{ Request::is('guru_piket/dashboard') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Menu Utama</li>
            <li class="nav-item dropdown {{ Request::is('guru_piket/guru-piket*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-friends"></i>
                    <span>Kelola Siswa</span>
                </a>
                <ul class="dropdown-menu">
                    {{-- <li class="{{ Request::is('guru_piket/guru-piket/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kepala-sekolah.create') }}">Buat Akun</a>
                    </li> --}}
                    <li class="{{ Request::is('guru_piket/guru-piket/presensi') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('guru_piket.guru-piket.presensi.index') }}">Data Presensi</a>
                    </li>
                </ul>
            </li>

            {{-- <li class="nav-item dropdown {{ Request::is('admin/guru-bk*') ? 'active' : '' }}">
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

            <li class="nav-item dropdown {{ Request::is('admin/guru-piket*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-friends"></i>
                    <span>Kelola Guru Piket</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/guru-piket/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.guru-piket.create') }}">Buat Akun</a>
                    </li>
                    <li class="{{ Request::is('admin/guru-piket/data') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.guru-piket.index') }}">Data Guru Piket</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/kelola-akademik*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-friends"></i>
                    <span>Kelola Akademik</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/kelola-akademik/kelas') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kelola-akademik.kelas.index') }}">Data Kelas</a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/kelola-akademik/jurusan') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kelola-akademik.jurusan.index') }}">Data Jurusan</a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/kelola-akademik/semester') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kelola-akademik.semester.index') }}">Data
                            Semester</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item dropdown {{ Request::is('admin/kelola-siswa*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-friends"></i>
                    <span>Kelola Siswa</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/kelola-siswa/siswa') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kelola-siswa.siswa.index') }}">Data Siswa</a>
                    </li>
                    <li class="{{ Request::is('admin/kelola-siswa/presensi') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kelola-siswa.presensi.index') }}">Data Presensi
                            Siswa</a>
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
            </li> --}}

            {{-- <li class='{{ Request::is('admin/pangkat') ? 'active' : '' }}'>
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
            </li> --}}
        </ul>
    </aside>
</div>

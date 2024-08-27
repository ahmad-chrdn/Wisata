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
                    {{-- <li class="{{ Request::is('admin/kelola-siswa/presensi') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kelola-siswa.presensi.index') }}">Data Presensi
                            Siswa</a>
                    </li>
                    <li class="{{ Request::is('admin/kelola-siswa/bermasalah') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kelola-siswa.bermasalah.index') }}">Data Siswa
                            Bermasalah</a>
                    </li> --}}
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

            {{-- <li class="nav-item dropdown {{ Request::is('admin/guru-bk*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-tie"></i>
                    <span>Kelola Guru BK</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/guru-bk/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.guru-bk.create') }}">Buat Akun</a>
                    </li>
                    <li class="{{ Request::is('admin/guru-bk/data') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.guru-bk.index') }}">Data Guru BK</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/wali-kelas*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-users"></i>
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
                    <i class="fas fa-calendar-check"></i>
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
                    <i class="fas fa-book"></i>
                    <span>Kelola Akademik</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/kelola-akademik/kelas') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kelola-akademik.kelas.index') }}">Data Kelas</a>
                    </li>
                    <li class="{{ Request::is('admin/kelola-akademik/jurusan') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kelola-akademik.jurusan.index') }}">Data Jurusan</a>
                    </li>
                    <li class="{{ Request::is('admin/kelola-akademik/semester') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kelola-akademik.semester.index') }}">Data
                            Semester</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/kelola-siswa*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-graduate"></i>
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
                    <li class="{{ Request::is('admin/kelola-siswa/bermasalah') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.kelola-siswa.bermasalah.index') }}">Data Siswa
                            Bermasalah</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/rekapitulasi*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-chart-line"></i>
                    <span>Rekapitulasi</span>
                </a>
                <ul class="dropdown-menu">
                    @if ($kelasKosong)
                        <li class="text-center text-muted">Tidak ada rekapitulasi</li>
                    @else
                        @foreach ($kelas as $kls)
                            <li class="{{ Request::is('admin/rekapitulasi/rekap/' . $kls->id) ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('admin.rekapitulasi.rekap.show', $kls->id) }}">{{ $kls->nm_kelas }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </li> --}}
        </ul>
    </aside>
</div>

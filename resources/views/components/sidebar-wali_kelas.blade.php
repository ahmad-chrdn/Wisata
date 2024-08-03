<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('wali_kelas.dashboard') }}"><img src="{{ asset('img/SMK.png') }}" style="height: 70px"
                    alt="SMKN 01 SEMPARUK"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('wali_kelas.dashboard') }}"><img src="{{ asset('img/SMK.png') }}" alt="SMKN 01 SEMPARUK"
                    class="img-fluid" style="max-width: 90px; max-height: 40px;"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Beranda</li>
            <li class='{{ Request::is('wali_kelas/dashboard') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ route('wali_kelas.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Menu Utama</li>
            <li class="nav-item dropdown {{ Request::is('wali_kelas/kelola-siswa*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-user-friends"></i>
                    <span>Kelola Siswa</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('wali_kelas/kelola-siswa/cetak-barcode') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('wali_kelas.cetak-barcode') }}">Barcode Presensi</a>
                    </li>
                    <li class="{{ Request::is('wali_kelas/kelola-siswa/presensi') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('wali_kelas.kelola-siswa.presensi.index') }}">Data Presensi
                            Siswa</a>
                    </li>
                    <li class="{{ Request::is('wali_kelas/kelola-siswa/bermasalah') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('wali_kelas.kelola-siswa.bermasalah.index') }}">Data
                            Siswa Bermasalah</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('wali_kelas/rekapitulasi*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-chart-line"></i>
                    <span>Rekapitulasi</span>
                </a>
                <ul class="dropdown-menu">
                    @if ($kelasKosong)
                        <li class="text-center text-muted">Tidak ada rekapitulasi</li>
                    @else
                        @foreach ($kelas as $kls)
                            <li class="{{ Request::is('wali_kelas/rekapitulasi/rekap/' . $kls->id) ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('wali_kelas.rekapitulasi.rekap.show', $kls->id) }}">{{ $kls->nm_kelas }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </li>
        </ul>
    </aside>
</div>

<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                    <i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <div class="search-element">
            <a href="#" class="logo">
                <img src="{{ asset('img/SMK.png') }}" alt="Logo" class="logo-image"
                    style="width: 90px; height: auto;">
            </a>
        </div>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="Foto Admin" src="{{ asset('storage/foto/' . auth()->user()->foto) }}"
                    style="width: 40px; height: 40px;" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->nama }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title text-center">Akun</div>

                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.profile.edit') }}" class="dropdown-item has-icon">
                        <i class="far fa-user"></i><span>Profil Saya</span>
                    </a>
                @elseif (auth()->user()->role === 'kepala sekolah')
                    <a href="{{ route('kepala_sekolah.profile.edit') }}" class="dropdown-item has-icon">
                        <i class="far fa-user"></i><span>Profil Saya</span>
                    </a>
                @elseif (auth()->user()->role === 'guru bk')
                    <a href="{{ route('guru_bk.profile.edit') }}" class="dropdown-item has-icon">
                        <i class="far fa-user"></i><span>Profil Saya</span>
                    </a>
                @elseif (auth()->user()->role === 'wali kelas')
                    <a href="{{ route('wali_kelas.profile.edit') }}" class="dropdown-item has-icon">
                        <i class="far fa-user"></i><span>Profil Saya</span>
                    </a>
                @elseif (auth()->user()->role === 'guru piket')
                    <a href="{{ route('guru_piket.profile.edit') }}" class="dropdown-item has-icon">
                        <i class="far fa-user"></i><span>Profil Saya</span>
                    </a>
                @endif

                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i><span>Keluar</span>
                    </a>
                </form>
            </div>

        </li>
    </ul>
</nav>

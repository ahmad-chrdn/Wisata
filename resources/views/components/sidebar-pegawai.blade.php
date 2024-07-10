<!-- Sidebar Section -->
<div class="sidebar">
    <!-- Profile Section in Sidebar -->
    <div class="profile">
        <input type="checkbox" id="profile-toggle" class="profile-toggle" />
        <label for="profile-toggle" class="profile-label">
            <img src={{ asset('images/shifa.jpg') }} alt="Admin" />
            <span>{{ auth()->user()->nama }}</span>
            <i class="fas fa-caret-down"></i>
        </label>
        <ul class="profile-dropdown">
            <li>
                <a href="pengaturan_akun.html">Pengaturan Akun</a>
            </li>
        </ul>
    </div>

    <!-- Main Navigation -->
    <nav aria-label="Main Navigation">
        <ul class="nav-items">
            <li class="active">
                <a href="dashboard.html"><i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li>
                <a href="monitoring.html"><i class="fas fa-chart-line"></i> Monitoring</a>
            </li>
            <li>
                <a href="controling.html"><i class="fas fa-cog"></i> Controlling</a>
            </li>
        </ul>
    </nav>

    <!-- Secondary Navigation -->
    <nav class="nav-bottom" aria-label="Secondary Navigation">
        <ul>
            <li>
                <a href="notification.html"><i class="fas fa-bell"></i> Notification</a>
            </li>
            <li>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout</a>
                    {{-- <i class="fas fa-sign-out-alt"></i><span> Keluar</span> --}}
                    </a>
                </form>
            </li>
        </ul>
    </nav>
</div>

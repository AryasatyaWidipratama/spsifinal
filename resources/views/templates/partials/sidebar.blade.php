<div class="sidebar" data-color="purple" data-image="{{ asset('assets/dashboard/img/sidebar-5.jpg') }}">
    <!--
Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
Tip 2: you can also add an image using data-image tag
-->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                SPSI Final
            </a>
        </div>

        <ul class="nav">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard.index') }}">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            @can('mahasiswa')
            <li class="{{ Request::is('dashboard/jadwal-sidang*') ? 'active' : '' }}">
                <a href="{{ route('jadwal-sidang.mahasiswa') }}">
                    <i class="pe-7s-date"></i>
                    <p>Jadwal Sidang</p>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/laporan*') ? 'active' : '' }}">
                <a href="{{ route('laporan.index') }}">
                    <i class="pe-7s-note2"></i>
                    <p>Laporan</p>
                </a>
            </li>
            @endcan

            @can('dosen')
            <li class="{{ Request::is('dashboard/jadwal-sidang*') ? 'active' : '' }}">
                <a href="{{ route('jadwal-sidang.dosen') }}">
                    <i class="pe-7s-news-paper"></i>
                    <p>Jadwal Sidang</p>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/honor*') ? 'active' : '' }}">
                <a href="{{ route('honor.dosen') }}">
                    <i class="pe-7s-cash"></i>
                    <p>Honor</p>
                </a>
            </li>
            @endcan

            <li>
                <a href="maps.html">
                    <i class="pe-7s-map-marker"></i>
                    <p>Maps</p>
                </a>
            </li>
            <li>
                <a href="notifications.html">
                    <i class="pe-7s-bell"></i>
                    <p>Notifications</p>
                </a>
            </li>
            {{-- <li class="active-pro">
                <a href="upgrade.html">
                    <i class="pe-7s-rocket"></i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
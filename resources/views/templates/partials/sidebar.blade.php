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
            <li class="active">
                <a href="{{ route('dashboard.index') }}">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            {{-- MENU MAHASISWA --}}
            <li>
                <a href="user.html">
                    <i class="pe-7s-date"></i>
                    <p>Jadwal Sidang</p>
                </a>
            </li>
            <li>
                <a href="table.html">
                    <i class="pe-7s-note2"></i>
                    <p>Laporan</p>
                </a>
            </li>
            {{-- END MENU MAHASISWA --}}

            <li>
                <a href="typography.html">
                    <i class="pe-7s-news-paper"></i>
                    <p>Typography</p>
                </a>
            </li>
            <li>
                <a href="icons.html">
                    <i class="pe-7s-science"></i>
                    <p>Icons</p>
                </a>
            </li>
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
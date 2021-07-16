<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('bengkelprofil')}}" class="waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span>Profile</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('daftarpemesanan')}}" class="waves-effect">
                        <i class="mdi mdi-message-text-clock"></i><span class="badge badge-pill badge-info float-right">3</span>
                        <span>Daftar Pemesanan</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('riwayatpesanan')}}"class="waves-effect">
                        <i class="bx bx-task"></i>
                        <span>Riwayat Pemesanan</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('daftartransaksi')}}"class="waves-effect">
                        <i class="dripicons-align-justify"></i>
                        <span>Daftar Transaksi</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('logoutbengkel')}}" class="waves-effect">
                        <i class="mdi mdi-logout"></i>
                        <span>LOGOUT</span>
                    </a>
                <li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
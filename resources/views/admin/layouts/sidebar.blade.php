<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route('dashboardindex')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right"></span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-blog"></i>
                        <span>Kategori Service</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('kategoriservice.index',['page' => 1]) }}">Nama Kategori</a></li>
                        <li><a href="{{ route('masalah',['page' => 1]) }}">Masalah Service</a></li>
                        <li><a href="{{ route('jenis',['page' => 1]) }}">Jenis Service</a></li>
                        <li><a href="{{ route('merek',['page' => 1]) }}">Merek Service</a></li>
                    </ul>
                </li>

                {{-- <li>
                    <a href="{{ route('kategoriservice.index',['page' => 1]) }}" class="waves-effect">
                        <i class="dripicons-blog"></i><span class="badge badge-pill badge-info float-right"></span>
                        <span>Kategori Service</span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('penggunabengkel')}}" class="waves-effect">
                        <i class="bx bx-store"></i><span class="badge badge-pill badge-info float-right"></span>
                        <span>Kelola Bengkel Service</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('pelangganservice')}}" class="waves-effect">
                        <i class="bx bxs-user-rectangle"></i><span class="badge badge-pill badge-info float-right"></span>
                        <span>Kelola Pelanggan</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('datatransaksi')}}" class="waves-effect">
                        <i class="bx bx-transfer"></i><span class="badge badge-pill badge-info float-right"></span>
                        <span>Data Pemesanan</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
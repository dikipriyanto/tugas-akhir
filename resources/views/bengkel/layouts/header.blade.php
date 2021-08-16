<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                {{-- <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a> --}}

                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('pelanggan/assets/img/LOGOANYAR.png')}}" alt="" height="22">
                    </span>
                    <span class="navbar-brand">
                        <img src="{{asset('pelanggan/assets/img/LOGOANYAR.png')}}" alt="35" height="55">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown">
        
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block notification-dropdown" style="margin-right: 15px">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>
                    {{-- <span class="badge badge-danger badge-circle" id="count-notification" data-count="0">0</span> --}}
                    <span class="badge badge-danger badge-circle" id="count-notification" data-count="{{ count($notif) }}">{{ count($notif) }}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifikasi </h6>
                            </div>
                            {{-- <div class="col-auto">
                                <a href="#!" class="small"> View All</a>
                            </div> --}}
                        </div>
                    </div>
                    <div style="max-height: 230px;" id="container-notification">
                        @foreach ($notif as $n)
                        <a href="{{ route('daftarpemesanan') }}" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">{{ $n->nama_pemesan }}</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">Pesanan masuk</p>
                                    </div>
                                </div>
                            </div>
                        </a>                            
                        @endforeach
                    </div>
                    {{-- <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle mr-1"></i> View More..
                        </a>
                    </div> --}}
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(session('namabengkel'))
                    
                    <span class="d-none d-xl-inline-block ml-1"><p>Halo, <b>{{session('namabengkel') }} !</b> </p></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="{{route('editbengkelprofil')}}"><i class="bx bx-user font-size-16 align-middle mr-1"></i>Edit Profile</a>
                    <a class="dropdown-item" href="{{route('gantipassword')}}"><i class="bx bxs-key font-size-16 align-middle mr-1"></i>Ganti Password</a>
                    {{-- <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle mr-1"></i> My Wallet</a>
                    <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle mr-1"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a> --}}
                </div>
            </div>

        </div>
    </div>
</header>

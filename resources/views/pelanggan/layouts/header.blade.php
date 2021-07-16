        <!-- header begin -->
        <div class="header">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 d-xl-flex d-lg-flex d-block align-items-center">
                            <div class="part-left">
                                <ul>
                                    {{-- <li>
                                        <a href="support.html">
                                            <span class="part-icon">
                                                <i class="fas fa-headset"></i>
                                            </span>
                                            <span class="text">
                                                Support
                                            </span>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="mailto:someone@example.com">
                                            <span class="part-icon">
                                                <i class="far fa-envelope"></i>
                                            </span>
                                            <span class="text">
                                                hanyaTesting@gmail.com 
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        
                        <div class="col-xl-6 col-lg-6">
                            <div class="part-right">
                                <ul>
                                    @if(session('namaPelanggan'))
                                        <li class="float-right d-flex align-items-center">
                                            <span class="part-icon user d-flex align-items-center justify-content-center">
                                                <i class="far fa-user"></i>
                                            </span>
                                            <p>Halo, <b>{{session('namaPelanggan') }} !</b> </p>
                                            {{-- <a href="#" class="c-acc" data-toggle="modal" data-target="#exampleModal">Masuk | Daftar</a> --}}
                                        </li>
                                    @else
                                        
                                    <li class="float-right d-flex align-items-center">
                                            <span class="part-icon user d-flex align-items-center justify-content-center">
                                                <i class="far fa-user"></i>
                                            </span>
                                            <a href="#" class="c-acc" data-toggle="modal" data-target="#exampleModal"><strong>Masuk | Daftar</strong></a>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="header-bottom">
                    <div class="row">
                        <div class="col-xl-3 col-lg-2 d-xl-flex d-lg-flex align-items-center">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-6 d-xl-block d-lg-block d-flex align-items-center">
                                    <div class="logo">
                                        {{-- <a href="index-2.html">
                                            <img src="pelanggan/assets/img/logo.png" alt="">
                                        </a> --}}
                                    </div>
                                </div>
                                <div class="col-6 d-xl-none d-lg-none d-block">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-10">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                  
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('pelanggan.index')}}">Beranda</a>
                                            </li>
                                            @if (session('token_pelanggan'))
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" href="#">Profil</a>
                                            </li> --}}
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('statusservice')}}">Status Service</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('riwayatpemesanan')}}">Riwayat Pemesanan</a>
                                            </li>    
                                            @else{{-- @endif --}}
                                            
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" href="#">Tentang Bengkel Service</a>
                                            </li> --}}

                                            <li class="nav-item buy-nows">
                                                <a class="nav-link buy-now" href="{{ route('loginbengkel1')}}">Login Bengkel</a>
                                            </li>

                                            @endif
                                            @if (session('token_pelanggan'))
                                            <li class="nav-item">
                                                <a class="nav-link"  href="{{ route('logoutPelanggan')}}">LOGOUT</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header -->
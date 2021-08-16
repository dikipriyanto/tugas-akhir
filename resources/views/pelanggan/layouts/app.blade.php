<!DOCTYPE html>
<html lang="zxx">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Pemesanan Bengkel Service Elektronik</title>
        <!-- favicon -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{asset('pelanggan/assets/css/bootstrap.min.css')}}">
        <!-- fontawesome icon  -->
        <link rel="stylesheet" href="{{asset('pelanggan/assets/css/fontawesome.min.css')}}">
        <!-- flaticon css -->
        <link rel="stylesheet" href="{{asset('pelanggan/assets/fonts/flaticon.css')}}">
        <!-- animate.css -->
        <link rel="stylesheet" href="{{asset('pelanggan/assets/css/animate.css')}}">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="{{asset('pelanggan/assets/css/owl.carousel.min.css')}}">
        <!-- magnific popup -->
        <link rel="stylesheet" href="{{asset('pelanggan/assets/css/magnific-popup.css')}}">
        {{-- <!-- vector map css -->
        <link rel="stylesheet" href="{{asset('pelanggan/assets/css/jquery-jvectormap-2.0.3.css')}}"> --}}
        <!-- stylesheet -->
        <link rel="stylesheet" href="{{asset('pelanggan/assets/css/style.css')}}">
        <!-- responsive -->
        <link rel="stylesheet" href="{{asset('pelanggan/assets/css/responsive.css')}}">
        <link rel="stylesheet" href="{{asset('pelanggan/assets/css/shop-cart-responsive.css')}}">

        <!-- Sweet Alert-->
        <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @cloudinaryJS
    </head>

    <body>

        <!-- back to top button begin -->
        <div class="back-to-top-button">
            <button>
                <i class="fas fa-level-up-alt"></i>
            </button>
        </div>
        <!-- back to top button end -->

        <!-- Modal -->
        {{-- <div class="modal modal-registration fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
               
            <div class="modal-content">
                <ul class="nav nav-tabs" id="myTab-modal" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="signIn-Tab" data-toggle="tab" href="#signIn" role="tab" aria-controls="signIn" aria-selected="true">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="signUp-Tab" data-toggle="tab" href="#signUp" role="tab" aria-controls="signUp" aria-selected="false">Daftar</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTab-modalContent">
                <div class="tab-pane fade show active" id="signIn" role="tabpanel" aria-labelledby="signIn-Tab">
                    <h3 class="title">Silahkan Masuk Terlebih Dahulu</h3>
                    <form method="POST" action="{{route('loginPelanggan')}}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Kata sandi">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <input type="submit" value="login" class="create-account-btn">
                    </form>
                </div>
                <div class="tab-pane fade" id="signUp" role="tabpanel" aria-labelledby="signUp-Tab">
                    <h3 class="title">Registrasi Akun</h3>
                    <form method="POST" action="{{route('registerPelanggan')}}" >
                        @csrf
                        <div class="form-group">
                            <input type="text" name="nama" id="nama" placeholder="Nama Lengkap">
                            @error('nama')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="alamat" placeholder="Alamat lengkap">
                            @error('alamat')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" name="no_hp" placeholder="No HP/Telepon">
                            @error('no_hp')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Masukan Alamat Email">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Kata sandi">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="konfirmasi_password" placeholder="Ulangi sandi">
                            @error('konfirmasi_password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <input type="submit" value="DAFTAR" class="create-account-btn">
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div> --}}
        @include('pelanggan.layouts.modal')
        <!-- End Modal -->

        <!-- header begin -->
        @include('pelanggan.layouts.header')
        <!-- header -->


        <!-- content -->
        @yield('content')
        <!-- end content -->
        
        <!-- header end -->
        <!-- jquery -->
        <script src="{{asset('pelanggan/assets/js/jquery.js')}}"></script>
        <!-- bootstrap -->
        <script src="{{asset('pelanggan/assets/js/bootstrap.min.js')}}"></script>
        <!-- owl carousel -->
        <script src="{{asset('pelanggan/assets/js/owl.carousel.js')}}"></script>
        <!-- magnific popup -->
        <script src="{{asset('pelanggan/assets/js/jquery.magnific-popup.js')}}"></script>
        <!-- filterizr js -->
        <script src="{{asset('pelanggan/assets/js/jquery.filterizr.min.js')}}"></script>
        <!-- way poin js-->
        <script src="{{asset('pelanggan/assets/js/waypoints.min.js')}}"></script>
        <!-- counter up js -->
        <script src="{{asset('pelanggan/assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('pelanggan/assets/js/gdp-data.js')}}"></script>
        <!-- wow js-->
        <script src="{{asset('pelanggan/assets/js/wow.min.js')}}"></script>
        <!-- main -->
        <script src="{{asset('pelanggan/assets/js/main.js')}}"></script>
        <script src="{{asset('pelanggan/assets/js/rangeslider.js')}}"></script>
        <script src="{{asset('pelanggan/assets/js/shop-cart.js')}}"></script>

        <!-- Sweet Alerts js -->
        <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

        <!-- ALERT LOGIN DAN REGISTER -->
        @yield('script')
        @if (Session::has('errors'))
            <script>
                $('#exampleModal').modal({show:true})
                // $('#exampleModal').tabs({active : '#signUp'})
            </script>
        @endif

        @if (Session::has('gagalmasuk'))
            <script>
                Swal.fire({
                    title: "Silahkan Masuk Terlebih Dahulu!",
                    confirmButtonColor: "#556ee6"
                })

                $('#exampleModal').modal({show:true})
                // $('#exampleModal').tabs({active : '#signUp'})
            </script>
        @endif
        
    </body>
</html>
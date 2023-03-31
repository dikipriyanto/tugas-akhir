
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" /> --}}
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Selamat Datang</h5>
                                            <p>Silahkan masuk terlebih dahulu</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index.html">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logoutama.png" alt="" class="rounded-circle" height="67">
                                            </span>
                                        </div>
                                    </a>
                                </div>

                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                    
                                    @if (session('warning'))
                                    <div class="alert alert-warning">
                                        {{ session('warning') }}
                                    </div>
                                @endif

                                @if(session('message'))
                                    <div class="alert alert-success text-center mb-4" role="alert">
                                        {{ session('message')}}
                                    </div>
                                @endif

                                 @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                
                                @if(session('emailsalah'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        {{ session('emailsalah')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if(session('passwordsalah'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        {{ session('passwordsalah')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

            
                                <div class="p-2">
                                    <form class="form-horizontal" method="post" action="{{ route('loginbengkel')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" name="email" value="{{ old('email')}}" placeholder="Masukan email">
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" name="password" value="{{ old('password')}}" placeholder="Masukan password">
                                            @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                
                                        {{-- <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                                        </div> --}}
                                        
                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Masuk</button>
                                        </div>
            
                                        <div class="mt-4 text-center">
                                            <a href="{{route('forgotpasswordbengkel')}}" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Lupa password?</a>
                                        </div>

                                        <div class="mt-2 text-center">
                                            <p>Daftar Penyedia Bengkel service ? <a href="{{route('register')}}" class="font-weight-medium text-primary"> Daftar </a> </p>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>

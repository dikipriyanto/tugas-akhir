
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Themesbrand" name="author" />
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
                                    {{-- <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Free Register</h5>
                                            <p>Get your free Skote account now.</p>
                                        </div>
                                    </div> --}}
                                    <div class="col-5 align-self-end">
                                        <img src="{{asset('assets/images/profile-img.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index.html">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('assets/images/logo.svg')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal" method="POST" action="{{ route('registerbengkel')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap')}}" placeholder="masukan nama lengkap">
                                            @error('nama_lengkap')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Jasa Service</label>
                                            <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" name="nama_jasa_service" value="{{ old('nama_jasa_service')}}" placeholder="masukan nama jasa">
                                            @error('nama_jasa_service')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
            
                                        <div class="form-group">
                                            <label>Alamat Lengkap</label>
                                            <input type="text" class="form-control"  name="alamat_lengkap" value="{{ old('alamat_lengkap')}}" placeholder="masukan alamat">
                                            @error('alamat_lengkap')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>No Telepon</label>
                                            <input type="number" class="form-control" name="no_telepon" value="{{ old('no_telepon')}}" placeholder="masukan no telepon">
                                            @error('no_telepon')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Pilih kategori bengkel service</label>
                                            <select name="nama_kategori" class="form-control">
                                                <option value="">- Pilih -</option>
                                                @foreach ($kategori_services as $item)
                                                    {{-- <option value="{{ $item->nama_kategori}}">{{ $item->nama_kategori}}</option>  --}}
                                                    <option value="{{ $item->nama_kategori}}" @if(old('nama_kategori') ==$item->nama_kategori) selected @endif >{{ $item->nama_kategori}}</option> 
                                                @endforeach
                                            </select>
                                            @error('nama_kategori')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email')}}" placeholder="Masukan email">
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror        
                                        </div>
                
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" value="{{ old('password')}}" placeholder="Masukan password">
                                            @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror        
                                        </div>

                                        <div class="form-group">
                                            <label>Ulangi Password</label>
                                            <input type="password" class="form-control" name="konfirmasi_password" value="{{ old('konfirmasi_password')}}" placeholder="Ulangi password">
                                            @error('konfirmasi_password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror        
                                        </div>

                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            {{-- <input type="deskripsi" class="form-control" name="deskripsi" placeholder="deskripsi"> --}}
                                            <div>
                                                <textarea  name="deskripsi" class="form-control" rows="3">{{ old('deskripsi')}}</textarea>
                                            </div>
                                            @error('deskripsi')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror        
                                        </div>
                    
                                        <div class="mt-4">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Daftar</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <p>Sudah memiliki akun ? <a href="{{route('loginbengkel1')}}" class="font-weight-medium text-primary"> Login</a> </p>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </body>
</html>

        <!-- Modal -->
        <div class="modal modal-registration fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <input type="email" name="email" placeholder="Email">
                        {{-- <div class="form-group">
                            <input type="email" name="email" placeholder="Email">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div> --}}
                        <input type="password" name="password" placeholder="Password">
                        {{-- <div class="form-group">
                            <input type="password" name="password" placeholder="Kata sandi">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div> --}}
                        <input type="submit" value="login" class="create-account-btn">
                    </form>
                    <p>Masuk sebagai bengkel Service?<a href="#">Login</a></p>
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
                        {{-- <input type="password" name="password" placeholder="Kata sandi">
                        <input type="password" name="konfirmasi_password" placeholder="Ulangi sandi"> --}}
                        <input type="submit" value="DAFTAR" class="create-account-btn">
                    </form>
                    <p>Daftar sebagai bengkel Service?<a href="#">DAFTAR</a></p>
                </div>
                </div>
            </div>
            </div>
        </div>
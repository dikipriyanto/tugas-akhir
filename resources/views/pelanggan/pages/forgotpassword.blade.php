@include('pelanggan.layouts.head')
        <!-- about begin -->
        <div class="about">
            <div class="container">
                <div class="row justify-content-center">
                    {{-- <div class="col-xl-6 col-lg-6">
                        <div class="container">
                            <div class="row"> --}}
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="panel panel-default">
                                      <div class="panel-body">
                                        <div class="text-center">
                                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                                          <h2 class="text-center">Lupa Password?</h2>
                                          <p>Silahkan masukan alamat email disini.</p>
                                          <div class="panel-body">
                                            
                                            {{-- @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif --}}

                                            @if(session('message'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{ session('message')}}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif

                                            <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="{{route('postpwd')}}" >
                                                @csrf
                                              <div class="form-group">
                                                <div class="input-group">
                                                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                  <input id="email" name="email" placeholder="alamat email" class="form-control @error('email') is-invalid @enderror"  type="email" value="{{ old('email') }}" >
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                              </div>
                                              
                                              {{-- <input type="hidden" class="hide" name="token" id="token" value="">  --}}
                                            </form>
                            
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about end -->
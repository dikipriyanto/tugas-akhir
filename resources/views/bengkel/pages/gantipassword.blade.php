@extends('bengkel.layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            @if(session()->has('error'))
                    <span class="alert alert-danger">
                        <strong>{{ session()->get('error') }}</strong>
                    </span>
                @endif
                @if(session()->has('success'))
                    <span class="alert alert-success">
                        <strong>{{ session()->get('success') }}</strong>
                    </span>
                @endif
            <div class="card-body">
                <h4 class="card-title">Ubah Password</h4>

                <form class="custom-validation"method="post" action="{{route('updatepassword',$bengkelservice->id)}}">
                    @csrf
                    <input type="hidden" name="id"  value="{{ $bengkelservice->id }}">
                    <div class="form-group">
                        <div>
                            <input type="password" name="password_lama" class="form-control @error('password_lama') is-invalid @enderror" required
                                    placeholder="Masukan Password lama"/>
                                    @error('password_lama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required
                                    placeholder="Masukan password baru"/>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                        <div class="mt-2">
                            <input type="password" name="ulangi_password" autocomplete="ulangi_password" class="form-control @error('ulangi_password') is-invalid @enderror" required
                                    data-parsley-equalto="#pass2"
                                    placeholder="Ulangi password baru"/>
                                    @error('ulangi_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->


@endsection


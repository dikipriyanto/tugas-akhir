@extends('pelanggan.layouts.app')
@section('content')

    <div class="banner banner-3">
        <div class="container">
                <div class="card-body">
                    <div class="page-content">
                        {{-- <div class="container"> --}}
                            <div class="banner-content">
                                <div class="row justify-content-center">
                                    {{-- <h1>Professional
                                         For 
                                        Every Business
                                    </h1> --}}
                                    <div class="col-lg-7">
                                        <div class="card">
                                            <div class="card-body">
                                                <label class="row justify-content-center"><p><strong>CARI BENGKEL SERVICE ELEKTRONIK</strong></p></label>
                                                <form action="{{ route('caribengkel') }}">
                                                    <div class="form-row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <select name="caribengkel" class="form-control" method="get" href="{{ route('caribengkel') }}">
                                                                    <option value="#">PILIH BENGKEL SERVICE</option>
                                                                    @foreach ($kategori_services as $item)
                                                                        <option value="{{ $item->nama_kategori}}">{{ $item->nama_kategori}}</option> 
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary mb-10">CARI</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- </div>  --}}
                    </div>
                </div>
        </div>
    </div>

    
@endsection
@section('script')
    @if(Session::has('success'))
    <script>
        Swal.fire({
            title:"Pendaftaran Berhasil!",
            text:"Silahkan Login!",
            type:"success",
            
            confirmButtonColor:"#556ee6"
        })
    </script>
    @endif

    @if(Session::has('gagallogin'))
    <script>
        Swal.fire({
            title:"Email atau password salah !",
            confirmButtonColor:"#556ee6"
        })
    </script>
    @endif
@endsection
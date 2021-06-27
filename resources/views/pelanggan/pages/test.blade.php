@extends('pelanggan.layouts.banner')
@include('pelanggan.layouts.head')
@include('pelanggan.layouts.header')
@include('pelanggan.layouts.modal')
@include('pelanggan.layouts.script')
@section('content_banner')

<div class="card-body">
            <div class="banner-content">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9 col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <label class="row justify-content-center"><p><strong>CARI BENGKEL SERVICE ELEKTRONIK</strong></p></label>
                                <form action="{{ route('caribengkel') }}">
                                    <div class="form-row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <select name="caribengkel" class="form-control" method="get" href="{{ route('caribengkel') }}">
                                                    <option value="#">PILIH BENGKEL SERVICE</option>
                                                    {{-- @foreach ($kategori_services as $item)
                                                        <option value="{{ $item->nama_kategori}}">{{ $item->nama_kategori}}</option> 
                                                    @endforeach --}}
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

</div>

        <!-- ALERT LOGIN DAN REGISTER -->
        @yield('script')
        @if (Session::has('errors'))
            <script>
                $('#exampleModal').modal({show:true})
                // $('#exampleModal').tabs({active : '#signUp'})
            </script>
        @endif

@endsection
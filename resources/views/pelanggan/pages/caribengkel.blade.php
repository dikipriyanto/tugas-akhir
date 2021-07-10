<head>
    @include('pelanggan.layouts.head')
</head>
@extends('pelanggan.layouts.banner')

@section('content_banner')
<div class="row justify-content-center">
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                @foreach ($bengkelservice as $item)
                <div class="card card-body mt-3">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="col-md-2 mt-1"><img class="img-fluid img-responsive rounded product-image" src="https://w7.pngwing.com/pngs/803/214/png-transparent-car-maintenance-automobile-repair-shop-motor-vehicle-service-mechanic-repair-repair-logo-car.png"></div>
                        <div class="media-body">
                            <h5><strong>{{$item->nama_jasa_service}}</strong></h5>
                            <div class="mt-1 mb-1 spec-1"><span><strong>Nama</strong></span> : {{$item->nama_lengkap}}</div>
                            <div class="mt-1 mb-1 spec-1"><span><strong>Kategori Service</strong></span> : {{$item->nama_kategori}}</div>
                            <div class="mt-1 mb-1 spec-1"><span><strong>Alamat</strong></span> : {{$item->alamat_lengkap}}</div>
                            <div class="mt-1 mb-1 spec-1"><span><strong>Deskripsi</strong></span> : {{$item->deskripsi}}</div>
                        </div>
                        <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                            <a type="button" class="btn btn-primary waves-effect waves-light mt-5" href="{{route('formpemesanan', $item->id.'?kategori='.$item->nama_kategori)}}" >Pesan Jasa</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection


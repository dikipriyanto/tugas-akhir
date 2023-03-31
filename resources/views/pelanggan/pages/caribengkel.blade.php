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
                    @if ($item->available == 0)
                        <div style="position: absolute; z-index: 1; height: 100%; width: 100%; background-color: rgb(128, 128, 128, 0.6); left: 0; top:0; border-radius: 10px; display: flex; justify-content: center;">
                            <div class="" style="text-align: center;width: 100%; background-color: white; max-height: 20px; border-top-left-radius: 10px; border-top-right-radius: 10px">
                            <span style="font-size: 16px">PENUH</span></div>
                        </div>
                    @endif
                            <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                <div class="col-md-2 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{$item->logo != null ? $item->logo : 'https://w7.pngwing.com/pngs/803/214/png-transparent-car-maintenance-automobile-repair-shop-motor-vehicle-service-mechanic-repair-repair-logo-car.png'}}"></div>
                                <div class="media-body">
                                    <h5><strong>{{$item->nama_jasa_service}}</strong></h5>
                                    <div class="mt-1 mb-1 spec-1"><span><strong>Nama</strong></span> : {{$item->nama_lengkap}}</div>
                                    <div class="mt-1 mb-1 spec-1"><span><strong>Kategori Service</strong></span> : {{$item->nama_kategori}}</div>
                                    <div class="mt-1 mb-1 spec-1"><span><strong>Alamat</strong></span> : {{$item->alamat_lengkap}}</div>
                                    <div class="mt-1 mb-1 spec-1"><span><strong>Deskripsi</strong></span> : {{$item->deskripsi}}</div>
                                    
                                            <div class="rating" style="display: flex; align-items: center;gap : 2px">
                                                @if (count($item->rating))
                                                    @php $rate = $item->rating->sum('stars_rated') / $item->rating->count(); @endphp  
                                                    <div class="">  
                                                        @foreach(range(1,5) as $i)
                                                            <span class="fa-stack" style="width:1em">
                                                                <i class="far fa-star text-warning fa-stack-1x"></i>
                                            
                                                                @if($rate >0)
                                                                    @if($rate >0.5)
                                                                        <i class="fa fa-star text-warning fa-stack-1x"></i>
                                                                    @else
                                                                        <i class="fa fa-star-half text-warning fa-stack-1x"></i>
                                                                    @endif
                                                                @endif
                                                                @php $rate--; @endphp
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                    <span class="ml-1">{{round($item->rating->sum('stars_rated') / $item->rating->count(), 1)}} Rating</span>
                                                @elseif (!$item->rating = 0 )
                                                    <div class="">  
                                                        @foreach(range(1,5) as $i)
                                                            <span class="fa-stack" style="width:1em">
                                                                <i class="far fa-star text-warning fa-stack-1x"></i>
                                            
                                                                {{-- @if($rate >0)
                                                                    @if($rate >0.5)
                                                                        <i class="fa fa-star text-warning fa-stack-1x"></i>
                                                                    @else
                                                                        <i class="fa fa-star-half text-warning fa-stack-1x"></i>
                                                                    @endif
                                                                @endif
                                                                @php $rate--; @endphp --}}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                    <span class="ml-1"> Belum ada rating</span>
                                                @endif
                                            </div>
                                </div>
                                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                    <a type="button" class="btn btn-primary waves-effect waves-light mt-5" href=" @if ($item->available == 1){{route('formpemesanan', $item->id.'?kategori='.$item->nama_kategori)}}@else
                                        javascript:void(0)
                                        @endif " >Pesan Jasa</a>
                                </div>
                            </div>
                        
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection


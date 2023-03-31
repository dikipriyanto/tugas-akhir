<head>
    @include('pelanggan.layouts.head')
</head>
@include('pelanggan.layouts.header')
<div class="breadcrumb-todas">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-10">
                <div class="breadcrumb-content">
                    <h2 class="title">Hasil Pencarian "{{$searchbengkel}}"</h2>
                    {{-- <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Pages
                            </a>
                        </li>
                        <li id="current-page">Blog Details</li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="product">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    @forelse ($bengkelservice as $item)
                    <div class="col-xl-3 col-lg-3 col-sm-3">
                        <a href="@if ($item->available == 1)
                            {{route('formpemesanan', $item->id.'?kategori='.$item->nama_kategori)}}
                            @else
                            javascript:void(0)
                            @endif">
                            <div class="single-product" style="height: 400px;padding : 16px; position: relative;">
                                @if ($item->available == 0)
                                <div style="position: absolute; z-index: 1; height: 100%; width: 100%; background-color: rgb(128, 128, 128, 0.6); left: 0; top:0; border-radius: 10px; display: flex; justify-content: center;">
                                    <div class="" style="text-align: center;width: 100%; background-color: white; max-height: 20px; border-top-left-radius: 10px; border-top-right-radius: 10px">
                                        <span style="font-size: 16px">PENUH</span></div>
                                </div>
                                @endif
                            
                                <div class="d-flex justify-content-center align-items-center p-1">
                                    <img src="{{$item->logo != null ? $item->logo : 'https://w7.pngwing.com/pngs/803/214/png-transparent-car-maintenance-automobile-repair-shop-motor-vehicle-service-mechanic-repair-repair-logo-car.png'}}" alt="" width="112px" height="112px">
                                </div>
                                <div class="part-text">
                                    <a href="#">
                                        <span class="product-name" style="min-height: 60px;">{{$item->nama_jasa_service}}</span>
                                    </a>
                                    <div class="media-body">
                                        <div class="mt-1 mb-1 spec-1" >{{$item->nama_kategori}}</div>
                                        <div class="mt-1 mb-1 spec-1" style="overflow: hidden; text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">{{$item->alamat_lengkap}}</div>
                                        <div class="mt-1 mb-1 spec-1" style="overflow: hidden; text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">{{$item->deskripsi}}</div>
                                    </div>
                                </div>
                                <div class="rating justify-content-center mt-auto" style="display: flex; align-items: center;gap : 5px; position: absolute; bottom: 16px; width: 100%; left: 0">
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
                
                                                </span>
                                            @endforeach
                                        </div>
                                        <span class="ml-1"> 0 Rating</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                    <div class="container">
                    <div class="row justify-content-center">
                        <div class="section-title">
                            <span class="subtitle">MAAF BENGKEL SERVICE YANG ANDA CARI TIDAK DITEMUKAN</span>
                            
                        </div>
                    </div>
                    </div>
                    @endforelse                
                </div>
            </div>
            
        </div>
    </div>
</div>


            
@include('pelanggan.layouts.script')
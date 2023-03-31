<html>

<head>
    @include('pelanggan.layouts.head')
</head>
    <body>
       @include('pelanggan.layouts.header')
     <!-- blog page begin -->
             <!-- breadcrumb begin -->
             <div class="breadcrumb-todas">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8">
                            <div class="breadcrumb-content">
                                <h2 class="title">Status Service</h2>
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
            <!-- breadcrumb end -->
     <div class="blog-page blog-details">
        <div class="container">
            @foreach ($status as $item)
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">Kode Pemesanan : {{$item->kode_pemesanan}} </h4>
                            <div class="">
                                <ul class="verti-timeline list-unstyled">
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle"></i>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <i class="bx bx-copy-alt h2 text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <h5>Pesanan</h5>
                                                    <p class="text-muted">Nama Bengkel      : {{$item->bengkelservice->nama_jasa_service}}</p>
                                                    <p class="text-muted">Nama Pemesan      : {{$item->nama_pemesan}}</p>
                                                    <p class="text-muted">Tanggal Pemesanan : {{$item->tanggal_pemesanan}}</p>
                                                    <p class="text-muted">Status Pemesanan : <td>@if ($item->status_pesanan == 'proses')
                                                        <span
                                                            class="badge badge-pill badge-soft-info font-size-14">{{$item->status_pesanan}}</span>
                                                        @elseif($item->status_pesanan == 'selesai')
                                                        <span
                                                            class="badge badge-pill badge-soft-success font-size-14">{{$item->status_pesanan}}</span>
                                                        @elseif($item->status_pesanan == 'request')
                                                        <span
                                                            class="badge badge-pill badge-soft-warning font-size-14">{{$item->status_pesanan}}</span>
                                                        @elseif($item->status_pesanan == 'batal')
                                                        <span
                                                            class="badge badge-pill badge-soft-danger font-size-14">{{$item->status_pesanan}}</span>
                                                        @endif</td></p>
        
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i  @if ($item->status_pesanan == 'request') class="bx bx-right-arrow-circle bx-fade-right" @elseif($item->status_pesanan == 'proses') class="bx bx-right-arrow-circle" @endif></i>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <i class="bx bx-package h2 text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <h5>Konfirmasi Pemesanan</h5>
                                                    <p class="text-muted">Pihak bengkel akan menghubungi untuk konfirmasi pemesanan anda !</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="event-list active">
                                        <div class="event-timeline-dot">
                                            <i  @if ($item->status_pesanan == 'proses') class="bx bx-right-arrow-circle bx-fade-right" @elseif($item->status_pesanan == 'request') class="bx bx-right-arrow-circle" @endif></i>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <i class="bx bx-car h2 text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <h5>Menuju Lokasi</h5>
                                                    <p class="text-muted">Pihak bengkel akan menuju ke lokasi anda sesuai tanggal yang di tentukan !</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle"></i>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <i class="bx bx-badge-check h2 text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <h5>Selesai</h5>
                                                    <p class="text-muted"> </p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="row">
                <div class="col-10">
                    <div class="card">
                        @foreach ($status as $item)
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Nama Bengkel Service</label>
                                <div class="col-md-7">
                                    <label for="example-text-input" class="col-md-5 col-form-label">: {{$item->bengkelservice->nama_jasa_service}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Kode Pemesanan</label>
                                <div class="col-md-7">
                                    <label for="example-text-input" class="col-md-5 col-form-label">: {{$item->kode_pemesanan}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-md-3 col-form-label">Tanggal Pemesanan</label>
                                <div class="col-md-7">
                                    <label for="example-search-input" class="col-md-5 col-form-label">: {{$item->tanggal_pemesanan}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-md-3 col-form-label">Status Pesanan</label>
                                <div class="col-md-7">
                                    <label for="example-email-input" class="col-md-5 col-form-label">: 
                                        <td>@if ($item->status_pesanan == 'proses')
                                        <span
                                            class="badge badge-pill badge-soft-info font-size-14">{{$item->status_pesanan}}</span>
                                        @elseif($item->status_pesanan == 'selesai')
                                        <span
                                            class="badge badge-pill badge-soft-success font-size-14">{{$item->status_pesanan}}</span>
                                        @elseif($item->status_pesanan == 'request')
                                        <span
                                            class="badge badge-pill badge-soft-warning font-size-14">{{$item->status_pesanan}}</span>
                                        @elseif($item->status_pesanan == 'batal')
                                        <span
                                            class="badge badge-pill badge-soft-danger font-size-14">{{$item->status_pesanan}}</span>
                                        @endif</td></label>
                                </div>
                            </div> --}}
                            {{-- <div class="form-group row">
                                <label for="example-url-input" class="col-md-5 col-form-label">URL</label>
                                <div class="col-md-7">
                                    <label for="example-url-input" class="col-md-5 col-form-label">URL</label>
                                </div>
                            </div> --}}

                                
                                    {{-- <div class="py-2 mt-3">
                                        <h3 class="font-size-15 font-weight-bold">Estimasi Biaya</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Item</th>
                                                    <th class="text-right">Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    
                                                    <td>Biaya Service</td>
                                                    <td class="text-right">RP {{$item->estimasi_biaya != null ? $item->estimasi_biaya->biaya_service : 0  }}</td>
                                                </tr>
                                                
                                                <tr>
                                                    
                                                    <td>Biaya Sparepart</td>
                                                    <td class="text-right">RP {{$item->estimasi_biaya != null ? $item->estimasi_biaya->biaya_sparepart : 0}}</td>
                                                </tr>
                
                                                <tr>
                                                    
                                                    <td>Biaya Kedatangan</td>
                                                    <td class="text-right">RP {{$item->estimasi_biaya != null ? $item->estimasi_biaya->biaya_kedatangan : 0}}</td>
                                                </tr>
                                    
                                                <tr>
                                                    <td colspan="1" class="border-0 text-right">
                                                        <strong>Total</strong></td>
                                                    <td class="border-0 text-right"><h4 class="m-0">RP {{$item->estimasi_biaya != null ? $item->estimasi_biaya->total_biaya : 0}}</h4></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                            
                        </div>
                        @endforeach
                    </div>
                </div> <!-- end col -->
            </div>
        </div> --}}
     </div>

</div> <!-- container-fluid -->
</div>

     <!-- blog page end -->

     @include('pelanggan.layouts.script')
    </body>

    
 @if(Session::has('success'))
<script>
    Swal.fire({
        title:"Pemesanan Berhasil!",
        text:"Mohon tunggu penyedia jasa akan menghubungi anda !",
        type:"success",
        
        confirmButtonColor:"#556ee6"
    })
</script>
 @endif
</html>



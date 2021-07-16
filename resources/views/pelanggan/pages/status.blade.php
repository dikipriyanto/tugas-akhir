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
            <div class="row">
                <div class="col-10">
                    <div class="card">
                        @foreach ($status as $item)
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">ID Bengkel Service</label>
                                <div class="col-md-7">
                                    <label for="example-text-input" class="col-md-5 col-form-label">: {{$item->id_bengkel_service}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Kode Pemesanan</label>
                                <div class="col-md-7">
                                    <label for="example-text-input" class="col-md-5 col-form-label">: {{$item->kode_pemesanan}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-md-3 col-form-label">tanggal Pemesanan</label>
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
                            </div>
                            {{-- <div class="form-group row">
                                <label for="example-url-input" class="col-md-5 col-form-label">URL</label>
                                <div class="col-md-7">
                                    <label for="example-url-input" class="col-md-5 col-form-label">URL</label>
                                </div>
                            </div> --}}

                                
                                    <div class="py-2 mt-3">
                                        <h3 class="font-size-15 font-weight-bold">Estimasi Biaya</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    {{-- <th style="width: 70px;">No.</th> --}}
                                                    <th>Item</th>
                                                    <th class="text-right">Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($item->estimasi_biaya as $t)
                                                <tr>
                                                    {{-- <td>01</td> --}}
                                                    <td>Biaya Service</td>
                                                    <td class="text-right">RP {{$t->biaya_service}}.000</td>
                                                </tr>
                                                
                                                <tr>
                                                    {{-- <td>02</td> --}}
                                                    <td>Biaya Sparepart</td>
                                                    <td class="text-right">RP {{$t->biaya_sparepart}}.000</td>
                                                </tr>
                
                                                <tr>
                                                    {{-- <td>03</td> --}}
                                                    <td>Biaya Kedatangan</td>
                                                    <td class="text-right">RP {{$t->biaya_kedatangan}}.000</td>
                                                </tr>
                                    
                                                <tr>
                                                    <td colspan="1" class="border-0 text-right">
                                                        <strong>Total</strong></td>
                                                    <td class="border-0 text-right"><h4 class="m-0">RP {{$t->total_biaya}}.000</h4></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                            
                        </div>
                        @endforeach
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
     </div>

    <!-- end row -->

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



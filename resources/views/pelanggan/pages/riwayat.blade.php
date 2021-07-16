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
                                <h2 class="title">Riwayat Pemesanan</h2>
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
                    @foreach ($riwayatpemesanan as $item)
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    {{-- <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead> --}}
                                    <tbody>
                                        <tr>
                                            {{-- <td>01</td> --}}
                                            <td>ID Bengkel</td>
                                            <td class="text-left">{{$item->id_bengkel_service}}</td>
                                        </tr>
                                        
                                        <tr>
                                            {{-- <td>02</td> --}}
                                            <td>Kode Pemesanan</td>
                                            <td class="text-left">{{$item->kode_pemesanan}}</td>
                                        </tr>
        
                                        <tr>
                                            {{-- <td>03</td> --}}
                                            <td>Nama Pemesan</td>
                                            <td class="text-left">{{$item->nama_pemesan}}</td>
                                        </tr>

                                        <tr>
                                            {{-- <td>03</td> --}}
                                            <td>Tanggal Service</td>
                                            <td class="text-left">{{$item->tanggal_pemesanan}}</td>
                                        </tr>

                                        <tr>
                                            {{-- <td>03</td> --}}
                                            <td>Status Pesanan</td>
                                            <td>
                                                @if ($item->status_pesanan == 'proses')
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
                                                @endif
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td>Nota Biaya</td>
                                            <td class="text-left">{{$item->total_biaya}}</td>
                                        </tr> --}}
                                        <div class="py-2 mt-3">
                                            <h3 class="font-size-15 font-weight-bold">Order Detail</h3>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 70px;">No.</th>
                                                        <th>Item</th>
                                                        <th class="text-right">Nota Biaya</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Biaya Service</td>
                                                        <td class="text-right">RP {{$item->biaya_service}}</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Biaya Sparepart</td>
                                                        <td class="text-right">RP {{$item->biaya_sparepart}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>3</td>
                                                        <td>Biaya Kedatangan</td>
                                                        <td class="text-right">RP {{$item->biaya_kedatangan}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="border-0 text-right">
                                                            <strong>Total</strong></td>
                                                        <td class="border-0 text-right"><h4 class="m-0">RP {{$item->total_biaya}}</h4></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
</html>



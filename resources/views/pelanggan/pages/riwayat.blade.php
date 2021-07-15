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
                    <div class="card">
                        @foreach ($riwayatpemesanan as $item)
                        <div class="card-body">
                            {{-- <div class="form-group row">
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
                                    <label for="example-email-input" class="col-md-5 col-form-label">: {{$item->status_pesanan}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-md-3 col-form-label">Total Biaya</label>
                                <div class="col-md-7">
                                    <label for="example-email-input" class="col-md-5 col-form-label">: {{$item->total_biaya}}</label>
                                </div>
                            </div> --}}
                            {{-- <div class="form-group row">
                                <label for="example-url-input" class="col-md-5 col-form-label">URL</label>
                                <div class="col-md-7">
                                    <label for="example-url-input" class="col-md-5 col-form-label">URL</label>
                                </div>
                            </div> --}}

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
                                            <td>Tanggal Pemesanan</td>
                                            <td class="text-left">{{$item->tanggal_pemesanan}}</td>
                                        </tr>

                                        <tr>
                                            {{-- <td>03</td> --}}
                                            <td>Status Pesanan</td>
                                            <td class="text-left">{{$item->status_pesanan}}</td>
                                        </tr>
                                        <tr>
                                            {{-- <td>03</td> --}}
                                            <td>Total Biaya</td>
                                            <td class="text-left">{{$item->total_biaya}}</td>
                                        </tr>

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
</html>



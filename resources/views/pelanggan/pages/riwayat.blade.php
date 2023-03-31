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
                        {{-- <div class="card-body">
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
                            </div>
                                    <div class="py-2 mt-3">
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

                            
                        </div> --}}
                       
                

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="invoice-title">
                                            <h4 class="float-left font-size-16">Kode Pemesanan {{$item->kode_pemesanan}}</h4>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <address>
                                                    <strong>Keluhan :</strong><br>
                                                    @foreach($item->masalah_pesanan as $t) {{$t->nama_masalah}} @endforeach  <br>
                                                    @foreach($item->jenis_pesanan as $t) {{$t->nama_jenis}} @endforeach <br>
                                                    @foreach($item->merek_pesanan as $t) {{$t->nama_merek}} @endforeach <br>
                                                </address>
                                            </div>
                                            <div class="col-6 text-right">
                                                <address>
                                                    <strong>Informasi Bengkel:</strong><br>
                                                    {{$item->bengkelservice->nama_jasa_service}}<br>
                                                    {{$item->bengkelservice->alamat_lengkap}}<br>
                                                    {{$item->bengkelservice->no_telepon}}<br>
                                                    {{$item->bengkelservice->nama_kategori}}
                                                </address>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 mt-3">
                                                <address>
                                                    <strong>Nama Pemesan :</strong> {{$item->nama_pemesan}}<br>
                                                    <strong>Tanggal Pesanan :</strong> {{ date('d-m-Y',strtotime($item->created_at)) }}<br>
                                                    <strong>Status :</strong> <td>@if ($item->status_pesanan == 'proses')
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
                                                        @endif</td><br>
                                                </address>
                                            </div>
                                            <div class="col-6 mt-7 text-right">
                                                <address>
                                                    <strong>Tanggal Service:</strong><br>
                                                    {{$item->tanggal_pemesanan}}<br><br>
                                                </address>
                                            </div>
                                        </div>
                                        @if ($item->estimasi_biaya != null)
                                        <div class="py-2 mt-3">
                                            <h3 class="font-size-15 font-weight-bold">Estimasi Biaya</h3>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 70px;">No.</th>
                                                        <th>Item</th>
                                                        <th class="text-right">Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>Biaya Service</td>
                                                        <td class="text-right">RP {{$item->estimasi_biaya != null ? $item->estimasi_biaya->biaya_service : 0  }}</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>Biaya Sparepart</td>
                                                        <td class="text-right">RP {{$item->estimasi_biaya != null ? $item->estimasi_biaya->biaya_sparepart : 0}}</td>
                                                    </tr>
                    
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>Biaya Kedatangan</td>
                                                        <td class="text-right">RP {{$item->estimasi_biaya != null ? $item->estimasi_biaya->biaya_kedatangan : 0}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="border-0 text-right">
                                                            <strong>Total</strong></td>
                                                        <td class="border-0 text-right"><h4 class="m-0">RP {{$item->estimasi_biaya != null ? $item->estimasi_biaya->total_biaya : 0}}</h4></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @else
                                        
                                        @endif
                
                                        <strong>Berikan penilaian pelayanan pada bengkel ini</strong> 
                                        {{-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a> --}}
                                        <button type="button" id="btn-review" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#exampleModalScrollable"
                                            data-id-bengkel="{{$item->bengkelservice->id}}" data-id-pemesanan="{{$item->id}}"
                                        >Nilai</button>
                                        <div class="mt-2"
                                            style="border-top: 2px solid rgb(115, 115, 115); padding-top : 10px"
                                        >
                                            <h4><b>Ulasan</b></h4>

                                            @if (count($item->rating))
                                                @foreach ($item->rating as $rating)
                                                    <div class="border-top border-bottom pt-2 pb-4">
                                                        <div class=""><b>{{$rating->pelanggan->nama}}</b></div>
                                                        @php $rate = $rating->stars_rated; @endphp  

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
                                                        <div class="pt-2">{{$rating->review}}</div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="float-center">
                            

                            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <form action="{{route('addRating')}}" method="post">
                                            @csrf
                                            
                                            <h5 class="modal-title w-100 text-center">Nilai Sekarang</h5>
                                            <div class="modal-body">
                                                <input type="hidden" name="rated" class="rating" data-filled="mdi mdi-star text-primary" data-empty="mdi mdi-star-outline text-primary" data-fractions="2"/>
                                                {{-- <input type="hidden" name="id_bengkel" value="{{$item->bengkelservice->id}}">
                                                <input type="hidden" name="id_pemesanan" value="{{$item->id}}"> --}}
                                                <input type="hidden" name="id_bengkel" id="id_bengkel">
                                                <input type="hidden" name="id_pemesanan" id="id_pemesanan">
                                                <div class="mt-2">
                                                    <textarea placeholder="Isikan ulasan anda" name="review" class="form-control" id="" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
     </div>
    <!-- end row -->
</div>
</div>

     @include('pelanggan.layouts.script')
    </body>

     @if(Session::has('makasih'))
     <script>
         Swal.fire({
             title:"TERIMAKASIH PENILAIANNYA",
             text:"",
             type:"success",
             
             confirmButtonColor:"#556ee6"
         })
     </script>
      @endif

<script>
    $(document).ready(function(){
        $().cl

        $('.card .card-body').on("click", "#btn-review", function(){
            const idPemesanan = $(this).data('id-pemesanan');
            const idBengkel = $(this).data('id-bengkel');
            $('#id_pemesanan').val(idPemesanan);
            $('#id_bengkel').val(idBengkel)

            // $('#exampleModalScrollable').modal("show");
            console.log('#exampleModalScrollable');

        })
        
    });
</script>
      
</html>




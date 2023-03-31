{{-- <script
src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"
></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> --}}

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>

@extends('bengkel.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Daftar Transaksi</h4>
                <form action="{{route('searchtable')}}">
                @csrf
                <br>
                <div class="container">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="row input-daterange">
                                <label for="date" class="col-form-label col-sm--2">Start Tanggal</label>
                                <div class="col-md-3">
                                    <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required/>
                                </div>
                                <label for="date" class="col-form-label col-sm--2">Sampai Tanggal</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control input-sm" id="toDate" name="toDate" required/>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="search" title="seacrh">CARI</button>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
                <br>
                </form>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pemesanan</th>
                        <th>Nama Pemesan</th>
                        <th>Kategori</th>
                        <th>Tanggal Service</th>
                        <th>Tanggal Pesan</th>
                        <th>Status Pesanan</th>
                        <th>Rincian</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($riwayatpemesan as $item)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{$item->kode_pemesanan}}</td>
                            <td>{{$item->nama_pemesan}}</td>
                            <td>{{$item->bengkelservice->nama_kategori}}</td>
                            <td>{{ date('d M Y',strtotime($item->tanggal_pemesanan)) }}</td>
                            <td>{{ date('d M Y',strtotime($item->created_at)) }}</td>
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
                            <td>Rp. {{$item->estimasi_biaya != null ? number_format($item->estimasi_biaya->total_biaya, 0,0,".") :0}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                <b>TOTAL</b>
                            </th>
                            <th colspan="5"> 
                                Rp. {{number_format($riwayatpemesan->sum('estimasi_biaya.total_biaya'), 0 , 0, ".")}}
                                 {{-- {{ $item->estimasi_biaya->sum('total_biaya') != null ?  $item->estimasi_biaya : 0}} --}}
                                 {{-- {{ $item->estimasi_biaya->sum('total_biaya')}} --}}
                            </th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div>


@endsection
<script>

    $(document).ready(function () {
        $('#datatable').DataTable({
            pageLength: 100,
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                { extend: 'copy'},
                { extend: 'csv'},
                { extend: 'excel', title: 'ExampleFile'},
                { extend: 'pdf', title: 'ExampleFile'},
                
                { extend: 'print',
                footer: true,
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('front-size', '10px');

                    $(win.document.body).find('table')
                    .addClass('compact')
                    .css('front-size', 'inherit');
                }
            }
            ]
        });

        

        var rowTable = document.getElementById('datatable').rows[0].cells
        rowTable.forEach(element => {
            if(element.style.display === "none"){
                console.log("TES");
            }
        });
        console.log(document.getElementById('datatable').rows[0].cells[0]);
    });
    

</script>

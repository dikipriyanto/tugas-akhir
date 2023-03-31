<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>

@extends('admin.layouts.app')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Data Transaksi</h4>
                <form action="{{route('searchtanggal')}}">
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

                <table id="datatable" class="table unresponsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pemesanan</th>
                        <th>Nama Bengkel</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Service</th>
                        <th>Tanggal Pesan</th>
                        <th>Status Pesanan</th>
                        <th>Total</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($keloladatapemesanan as $e=>$item)
                        <tr>
                            <td>{{$e+1}}</td>
                            <td>{{$item->kode_pemesanan}}</td>
                            <td>{{$item->bengkelservice->nama_jasa_service}}</td>
                            <td>{{$item->pelanggan->nama}}</td>
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
                            <td>{{$item->estimasi_biaya != null ? $item->estimasi_biaya->total_biaya :0}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6"></th>
                            <th>
                                <b>SUBTOTAL</b>
                            </th>
                            <th>
                                {{-- @if(is_null($item->estimasi_biaya))
                                    0
                                @else
                                {{ $item->estimasi_biaya->sum('total_biaya')}}
                                @endif --}}
                                Rp. {{number_format($keloladatapemesanan->sum('estimasi_biaya.total_biaya'), 0 , 0, ".")}}
                            </th>
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
    });
    

</script>
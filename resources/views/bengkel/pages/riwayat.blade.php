@extends('bengkel.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Riwayat Pemesanan</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pemesanan</th>
                        <th>Nama Pemesan</th>
                        <th>Tanggal Pesanan</th>
                        <th>Status Pesanan</th>
                        <th>Total Biaya</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($riwayatpemesan as $e=>$item)
                        <tr>
                            <td>{{$e+1}}</td>
                            <td>{{$item->kode_pemesanan}}</td>
                            <td>{{$item->nama_pemesan}}</td>
                            <td>{{ date('d M Y',strtotime($item->tanggal_pemesanan)) }}</td>
                            <td>{{$item->status_pesanan}}</td>
                            <td>{{$item->total_biaya}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4"></th>
                            <th>
                                <b>TOTAL</b>
                            </th>
                            <th> 
                                @if (count($riwayatpemesan) > 0)
                                    <b>{{$item->total_biaya()}}</b>
                                @else
                                    <b>0</b>
                                @endif
                            </th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div>   
@endsection
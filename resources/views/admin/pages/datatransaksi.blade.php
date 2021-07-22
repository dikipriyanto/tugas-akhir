@extends('admin.layouts.app')
@section('content')
 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Data Transaksi</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Bengkel</th>
                        <th>ID Pelanggan</th>
                        <th>Kode Pemesanan</th>
                        <th>Nama Pemesan</th>
                        <th>Tanggal Service</th>
                        <th>Tanggal Pesan</th>
                        <th>Status Pesanan</th>
                        <th>Total Biaya</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($datatransaksi as $e=>$item)
                        <tr>
                            <td>{{$e+1}}</td>
                            <td>{{$item->id_bengkel_service}}</td>
                            <td>{{$item->id_pelanggan}}</td>
                            <td>{{$item->kode_pemesanan}}</td>
                            <td>{{$item->nama_pemesan}}</td>
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
                            <td>{{$item->total_biaya}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div>   

@endsection
@extends('bengkel.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    {{-- <div class="col-sm-4">
                        <div class="search-box mr-2 mb-2 d-inline-block">
                            <div class="position-relative">
                                <input id="custom-filter" type="text" class="form-control" placeholder="Cari...">
                                <i class="bx bx-search-alt search-icon"></i>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-sm-8">
                        <div class="text-sm-right">
                            <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> Add New Order</button>
                        </div>
                    </div><!-- end col--> --}}
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap" id="table-halaman-daftarpemesan">
                        <thead class="thead-light">
                            <tr>
                                <th>Kode Pemesan</th>
                                <th>Nama</th>
                                <th>No HP/WA</th>
                                <th>Tanggal Service</th>
                                <th>Tanggal Pesanan</th>
                                <th>Total Biaya</th>
                                {{-- <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Alamat</th> --}}
                                <th>Status</th>
                                <th>Keluhan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftarpemesan as $key => $item)
                            <tr>
                                <td>{{$item->kode_pemesanan}}</td>
                                <td>{{$item->nama_pemesan}}</td>
                                <td>{{$item->no_wa}}</td>
                                <td>{{$item->tanggal_pemesanan}}</td>
                                <td>{{ date('d M Y',strtotime($item->created_at)) }}</td>
                                <td>
                                    @if ($item->estimasi_biaya != null)
                                    {{$item->estimasi_biaya->total_biaya}}
                                    @else
                                    0
                                    @endif
                                </td>
                                {{-- <td>{{$item->kecamatan}}</td>
                                <td>{{$item->kelurahan}}</td>
                                <td>{{$item->alamat}}</td> --}}
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
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded" id="detail-halaman-daftarpemesan" data-id="{{$key}}" onclick="showModal({{$key}})">
                                        Lihat Detail
                                    </button>
                                </td>
                                <td>
                                    <a href="{{route('editpesanan', $item->id)}}" class="mr-3 text-primary"
                                        data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                    {{-- <a href="#" onclick="deleteRow({{$item->id}})" class="text-danger"
                                        data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Delete"><i class="mdi mdi-close font-size-18"></i></a> --}}
                                    <form action="{{ route('hapuspesanan', $item->id) }}" method="post"
                                        id="form-hapus-{{$item->id}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <ul class="pagination pagination-rounded justify-content-end mb-2">
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                            <i class="mdi mdi-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="javascript: void(0);" aria-label="Next">
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                    </li>
                </ul> --}}
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<!-- Modal -->
<div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keluhan Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body" id="body-modal">
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    
    function deleteRow(id) {
        swal({
            title: "Apa anda yakin?",
            text: "Data akan terhapus secara permanen !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $('#form-hapus-' + id).submit();
            }
        })
    }

    function showModal(key){
        console.log(key)
        const data = {!! $daftarpemesan !!}
        $('.exampleModal').modal('show')

        let html = '<p class="mb-2"><b>Masalah</b> :</p>'
        data[key].masalah_pesanan.map((masalah) => {
            html += '<p>'+ masalah.nama_masalah +'</p>'
        })

        html +='<p class="mb-2"><b>Merek</b> :</p>'
        data[key].merek_pesanan.map((merek) => {
            html += '<p>'+ merek.nama_merek +'</p>'
        })

        html +='<p class="mb-2"><b>Jenis</b> :</p>'
        data[key].jenis_pesanan.map((jenis) => {
            html += '<p>'+ jenis.nama_jenis +'</p>'
        })
        
        // <p class="mb-2">Merek : ${data[key].merek_pesanan[0].nama_merek}</p>
        // <p class="mb-2">Jenis : ${data[key].jenis_pesanan[0].nama_jenis}</p>
        html += `<p class="mb-2"><b>Informasi Tambahan</b> : ${data[key].informasi_tambahan == null ? "Tidak ada" : data[key].informasi_tambahan}</p>`
        html += `<p class="mb-2"><b>Alamat Lengkap</b> : ${data[key].alamat}</p>`
        html += `<p class="mb-2"><b>Kelurahan</b> : ${data[key].kelurahan}</p>`
        html += `<p class="mb-2"><b>Kecamatan</b> : ${data[key].kecamatan}</p>`
        

        $('#body-modal').html(html)
    }

    
    $(document).ready(function(){
        var table = $('#table-halaman-daftarpemesan').DataTable();
   //DataTable custom search field
         $('#custom-filter').keyup( function() {
         table.search( this.value ).draw();
    } );

});

</script>
@endsection
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>

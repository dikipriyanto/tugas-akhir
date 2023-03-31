@extends('admin.layouts.app')
@include('admin.layouts.head')
{{-- @include('admin.layouts.script') --}}

@section('content')
<body>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Bengkel Service</h5>     
                    <table id="datatable-buttons_wrapper" class="table unresponsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Nama Jasa Service</th>
                                <th>Alamat</th>
                                <th>No Telepone</th>
                                <th>Kategori service</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($bengkelservice as $bengkelservice1)
                        <tr>
                            <td>{{ $bengkelservice1->nama_lengkap }}</td>
                            <td>{{ $bengkelservice1->nama_jasa_service }}</td>
                            <td>{{ $bengkelservice1->alamat_lengkap }}</td>
                            <td>{{ $bengkelservice1->no_telepon }}</td>
                            <td>{{ $bengkelservice1->nama_kategori }}</td>
                            <td>{{ $bengkelservice1->email }}</td>
                            <td>
                                @if ($bengkelservice1->status == '0')
                                <span
                                    class="badge badge-pill badge-soft-danger font-size-14">Disable</span>
                                @elseif($bengkelservice1->status == '1')
                                <span
                                    class="badge badge-pill badge-soft-success font-size-14">Enable</span>
                                @endif
                            </td>
                            {{-- <td>
                                <form action="{{ route('penggunabengkelhapus', $bengkelservice1->id) }}" method="post" id="form-hapus-{{$bengkelservice1->id}}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                </form> 
                                <button onclick="deleteRow({{$bengkelservice1->id}})" class="btn btn-danger">Hapus</button>
                                <button onclick="#" class="btn btn-danger">Edit</button>
                            </td> --}}
                            <td>
                                    <form action="{{route('updatestatus')}}" method="post" >
                                        @csrf
                                        <input type="hidden" name="id"  value="{{$bengkelservice1->id}}">
                                        <input type="hidden" name="status" class="form-control" value="0" id="example-tel-input">
                                        <button onclick="#" class="btn btn-danger btn-sm">DISABLE</button>
                                    </form>

                                    <form action="{{ route('updatestatus')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id"  value="{{$bengkelservice1->id}}">
                                        <input type="hidden" name="status" class="form-control" value="1" id="example-tel-input">
                                        <button onclick="#" class="btn btn-success btn-sm">ENABLE</button>
                                    </form>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>

{{-- <script type="text/javascript">
    $(document).ready( function () {
        $('#datatable-buttons_wrapper').dataTable();
    } );
</script>  --}}

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
                $('#form-hapus-'+id).submit();
            }
        })
    }
</script>

</body>
@endsection

<script type="text/javascript">
    $(document).ready( function () {
        $('#datatable-buttons_wrapper').dataTable();
    } );
</script> 
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>

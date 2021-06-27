@extends('admin.layouts.app')
@include('admin.layouts.head')
@include('admin.layouts.script')
@section('content')
<body>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Pelanggan Service</h5>
                        
                            <table id="datatable-buttons_wrapper" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Telepone</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($pelanggan as $pelangganservice)
                                <tr>
                                    <td>{{ $pelangganservice->nama }}</td>
                                    <td>{{ $pelangganservice->alamat }}</td>
                                    <td>{{ $pelangganservice->no_hp }}</td>
                                    <td>{{ $pelangganservice->email }}</td>
                                    <td>
                                        <form action="{{ route('pelangganservicehapus', $pelangganservice->id) }}" method="post" id="form-hapus-{{$pelangganservice->id}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form> 
                                        <button onclick="deleteRow({{$pelangganservice->id}})" class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
            </div>
        </div>
    </div>
</div> 


<script type="text/javascript">
    $(document).ready( function () {
        $('#datatable-buttons_wrapper').dataTable();
    } );
</script> 

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
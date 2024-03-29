@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Nama Kategori</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('kategoriservice.index',['page' => 1]) }}">Kategori Service</a></li>
                    <li class="breadcrumb-item active">Nama Kategori</li>
                </ol>
            </div>
            
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="#" method="post" >
            <a width="50px" href="{{ route('kategoriservice.create')}}" class="btn btn-primary">tambah</a>
        </form>
        <table class="table table-striped">
            <tr>
                <th width="50px" scope="col">NO</th>
                <th scope="col">Nama Kategori</th>
                <th width="150px" scope="col">Aksi</th>
            </tr>
            <tbody>
                @foreach ( $kategori_services as $kategori_service)

                <tr>
                    <td>{{ ++$i  }}</td>
                    <td>{{ $kategori_service->nama_kategori }}</td>
                    <td> 
                        <form action="{{ route('kategoriservice.destroy', $kategori_service->id)}}" method="post" id="form-hapus-{{$kategori_service->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            {{-- <input type="hidden" name="page" value="{{ $_GET['page'] }}"> --}}
                        </form>
                        <a href="{{ route('kategoriservice.edit', $kategori_service->id) }}" class="btn btn-warning">edit</a>
                        <button onclick="deleteRow({{$kategori_service->id}})" class="btn btn-danger">Hapus</button>
                    </td>
                    
                </tr>

                @endforeach
            </tbody>
        </table>
        {{ $kategori_services->links() }}
    </div>
</div>    

@endsection

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
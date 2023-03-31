@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">jenis Service</h4>

            {{-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('kategoriservice.index',['page' => 1]) }}">Kategori Service</a></li>
                    <li class="breadcrumb-item active">Masalah Service</li>
                </ol>
            </div> --}}
            
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="#" method="post" >
            <a width="50px" href="{{ route('jeniscreate')}}" class="btn btn-primary">tambah</a>
        </form>
        <table class="table table-striped">
            <tr>
                <th width="50px" scope="col">NO</th>
                <th scope="col">Nama jenis</th>
                <th scope="col">ID Kategori</th>
                <th scope="col">Nama Kategori</th>
                <th width="150px" scope="col">Aksi</th>
            </tr>
            <tbody>
                @foreach ( $jenis as $jenish)

                <tr>
                    <td>{{ ++$i  }}</td>
                    <td>{{ $jenish->nama_jenis }}</td>
                    <td>{{ $jenish->kategori_id }}</td>
                    <td>{{ $jenish->kategori_service->nama_kategori }}</td>
                    <td> 
                        <form action="{{ route('jenishapus', $jenish->id)}}" method="post" id="form-hapus-{{$jenish->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            
                        </form>
                        <a href="{{ route('jenisedit', $jenish->id) }}" class="btn btn-warning">edit</a>
                        <button onclick="deleteRow({{$jenish->id}})" class="btn btn-danger">Hapus</button>
                    </td>
                    
                </tr>

                @endforeach
            </tbody>
        </table>
        {{ $jenis->links() }}
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
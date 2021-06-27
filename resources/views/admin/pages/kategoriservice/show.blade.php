@extends('admin.layouts.app')
@section('content')
 
<div class="page-title-box d-flex align-items-center justify-content-between">
    <h4 class="mb-0 font-size-18">Kategori Service</h4>
</div>
<div class="card">
    <div class="card-body">
        <table style="width : 300px">
            <tr>
                <td>Nama Kategori</td>
                <td>:</td>
                <td>{{ $kategori_services->nama_kategori}}</td>
            </tr>
            </tr>
        </table>
        <a href="{{route('kategoriservice.index')}}" class="btn btn-primary float-right">Kembali</a>
    </div>
</div>

@endsection
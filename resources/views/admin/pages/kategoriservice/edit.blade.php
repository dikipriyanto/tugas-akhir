@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card body">
    <form action="{{route('kategoriservice.update', $kategori_services->id)}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" value="{{ $kategori_services->nama_kategori }}">
        </div>
        <div class="form-group">
            <button type="submit">Simpan</button>
        </div>
    </form>
    </div>
</div>    
@endsection
@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{route('kategoriservice.update', $kategori_services->id)}}" method="post"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control"
                    value="{{ $kategori_services->nama_kategori }}">
            </div>

            <div class="form-group">
                <label for="">Foto</label><br>
                <input type="file" name="foto" class="form-control">
                @if($kategori_services->foto != null)
                    <img src="{{ $kategori_services->foto}}" alt="" width="111" style="margin-top: 5px">
                @else
                    <img src="https://stickershop.line-scdn.net/stickershop/v1/product/1392604/LINEStorePC/main.png;compress=true"
                        alt="">
                @endif
            </div>

            <div class="form-group">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

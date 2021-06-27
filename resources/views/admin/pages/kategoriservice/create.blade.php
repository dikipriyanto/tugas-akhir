@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
        <form action="{{ route('kategoriservice.store') }}" method="post">
            @csrf
                <div class="form-group">
                    <label for="">Tambah Kategori Service</label>
                    <input type="text" class="form-control" name="nama_kategori">
                </div>
        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
        <form action="{{ url('jenisstore') }}" >
            @csrf
                <div class="form-group">
                    <label for="">Nama Jenis</label>
                    <input type="text" class="form-control" name="nama_jenis">
                </div>
                <div class="form-group">
                    <label class="control-label">Pilih Masalah Kategori</label>
                    <select name="kategori_id" class="form-control">
                        <option value="">- Pilih -</option>
                        @foreach ($kategori_services as $item)
                            {{-- <option value="{{ $item->nama_kategori}}">{{ $item->nama_kategori}}</option>  --}}
                            <option value="{{ $item->id}}" @if(old('kategori_id') ==$item->id) selected @endif >{{ $item->nama_kategori}}</option> 
                        @endforeach
                    </select>
                </div>
        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
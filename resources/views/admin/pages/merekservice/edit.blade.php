@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
        <form action="{{ route('merekupdate', $merek->id) }}" method="post" >
            @csrf
                <div class="form-group">
                    <input type="hidden" class="form-control" value="{{$merek->id}}" name="id">
                    <label for="">Nama Masalah</label>
                    <input type="text" class="form-control" value="{{$merek->nama_merek}}" name="nama_merek">
                </div>
                <div class="form-group">
                    <label class="control-label">Pilih Kategori</label>
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
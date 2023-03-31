@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
        <form action="{{route('editadminupdate')}}" method="post" >
            @csrf
                @if(session('message'))
                    <div class="alert alert-success text-center mb-4" role="alert">
                        {{ session('message')}}
                    </div>
                @endif
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{$editadmin->email}}" class="form-control">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror   
                </div>

                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" class="form-control" name="password" value="{{ old('password')}}" placeholder="Masukan password">
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror        
                </div>
                
                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" class="form-control" name="konfirmasi_password" value="{{ old('password')}}" placeholder="Masukan password">
                    @error('konfirmasi_password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror        
                </div>
        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
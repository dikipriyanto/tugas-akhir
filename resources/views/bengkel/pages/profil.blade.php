@extends('bengkel.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4><i class ="fa fa-user"></i> Profile </h4>
                       <table class="table">
                           <tbody>
                                <tr>
                                   <td>NAMA</td>
                                   <td>:</td>
                                   <td>{{$bengkelservice->nama_lengkap}}</td>
                                </tr>
                                <tr>
                                    <td>NAMA JASA SERVICE</td>
                                    <td>:</td>
                                    <td>{{$bengkelservice->nama_jasa_service}}</td>
                                </tr>
                                <tr>
                                    <td>ALAMAT</td>
                                    <td>:</td>
                                    <td>{{$bengkelservice->alamat_lengkap}}</td>
                                </tr>
                                <tr>
                                    <td>NO TELEPON</td>
                                    <td>:</td>
                                    <td>{{$bengkelservice->no_telepon}}</td>
                                </tr>
                                <tr>
                                    <td>KATEGORI BENGKEL SERVICE</td>
                                    <td>:</td>
                                    <td>{{$bengkelservice->nama_kategori}}</td>
                                </tr>
                                <tr>
                                    <td>EMAIL</td>
                                    <td>:</td>
                                    <td>{{$bengkelservice->email}}</td>
                                </tr>
                                <tr>
                                    <td>DESKRIPSI</td>
                                    <td>:</td>
                                    <td>{{$bengkelservice->deskripsi}}</td>
                                </tr>
                           </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- <h1>PROFILE</h1> --}}
    </div>
@endsection
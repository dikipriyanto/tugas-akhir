@extends('bengkel.layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Profile</h4>

                <form class="custom-validation" method="post" action="{{route('updatebengkelprofil',$bengkelservice->id)}}"  enctype="multipart/form-data" >
                    @csrf
                    <input type="hidden" name="id"  value="{{ $bengkelservice->id }}">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama_lengkap" value="{{ $bengkelservice->nama_lengkap }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Nama Jasa Service</label>
                        <input type="text" name="nama_jasa_service" class="form-control" value="{{ $bengkelservice->nama_jasa_service }}">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat_lengkap" class="form-control" value="{{ $bengkelservice->alamat_lengkap }}">
                    </div>
                    
                    <div class="form-group">
                        <label>No Telopon/WA</label>
                        <div>
                            <input name="no_telepon" data-parsley-type="number" type="text"
                                    class="form-control" required
                                    value="{{ $bengkelservice->no_telepon }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>E-Mail</label>
                        <div>
                            <input type="email" name="email" class="form-control" required
                                    parsley-type="email" value="{{ $bengkelservice->email }}">
                        </div>
                    </div>

                    <div class="form-group" id="myTextarea" >
                        <label>Deskripsi</label>
                        <div>
                            <textarea  name="deskripsi"  class="form-control" rows="3">{{$bengkelservice->deskripsi}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Logo</label><br>
                        <input type="file" name="logo" class="form-control">
                        @if($bengkelservice->logo != null)
                            <img src="{{ $bengkelservice->logo}}" alt="" width="111" style="margin-top: 5px">
                        @else
                            <img src="https://stickershop.line-scdn.net/stickershop/v1/product/1392604/LINEStorePC/main.png;compress=true"
                                alt="">
                        @endif
                    </div>

                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script type="text/javascript" >
        function myFunction() {
          document.getElementById('myTextarea').value;
        }
    </script>
@endsection


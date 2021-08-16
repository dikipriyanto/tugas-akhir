<!DOCTYPE html>
<html lang="zxx">

    <head>
        @include('bengkel.layouts.head')
    </head>

    <body data-topbar="dark" data-layout="horizontal" >
        <div class="card-body">
            <div class="container-fluid">
                <div class="col-10">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Detail Keluhan</h4>
                                <form  action="{{ route('pelanggan.pesan') }}"  method="POST">
                                    @csrf
                                    <input type="hidden" name="bengkel_id" id="#" value="{{ $id }}">
                                    <input type="hidden" name="pelanggan_id" id="" value="{{ $id_pelanggan->id}}">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="col-md-7">
                                                    <div class="mt-4 mt-lg-2">
                                                        <h5 class="font-size-16 mb-7"><strong> Masalah {{ substr(strstr($kategori, " "), 1) }} yang anda miliki ?</strong></h5>
                                                        @foreach ($masalah as $item)
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="masalah[]" class="custom-control-input" id="{{ $item->nama_masalah }}" value="{{$item->nama_masalah}}" @if(is_array(old('masalah')) && in_array($item->nama_masalah, old('masalah'))) checked @endif >
                                                                <label class="custom-control-label" for="{{ $item->nama_masalah }}">{{ $item->nama_masalah }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    @error('masalah')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
        
                                            <div class="form-group mb-0">
                                                <div class="col-md-6">
                                                    <div class="mt-4 mt-lg-0">
                                                        <h5 class="font-size-16 mb-7"><strong> Jenis {{ substr(strstr($kategori, " "), 1) }} yang anda miliki?</strong></h5>
                                                        @foreach ($jenis as $item)
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="jenis[]" class="custom-control-input" id="{{ $item->nama_jenis }}" value="{{$item->nama_jenis}}" @if(is_array(old('jenis')) && in_array($item->nama_jenis, old('jenis'))) checked @endif >
                                                            <label class="custom-control-label" for="{{ $item->nama_jenis }}">{{ $item->nama_jenis }}</label>
                                                        </div>
                                                        @endforeach
                                                        @error('jenis')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="col-md-10">
                                                    <div class="mt-4 mt-lg-0">
                                                        <h5 class="font-size-16 mb-7"><strong> Merek {{ substr(strstr($kategori, " "), 1) }} yang Anda miliki ?</strong></h5>
                                                        @foreach ($merek as $item)
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="merek[]" class="custom-control-input" id="{{ $item->nama_merek }}" value="{{$item->nama_merek}}" @if(is_array(old('merek')) && in_array($item->nama_merek, old('merek'))) checked @endif >
                                                            <label class="custom-control-label" for="{{ $item->nama_merek }}">{{ $item->nama_merek }}</label>
                                                        </div>
                                                        @endforeach
                                                        @error('merek')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0">
                                                <div class="col-md-10">
                                                    <div class="mt-4 mt-lg-2">
                                                        <h5 class="font-size-16 mb-7"><strong>Informasi Tambahan</strong></h5>
                                                        <textarea name="informasi_tambahan" id="textarea" class="form-control" maxlength="225" rows="3" placeholder="Masukan Informasi Tambahan">{{ old('informasi_tambahan')}}</textarea>
                                                        @error('informasi_tambahan')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="card-body">
                    
                                                <h4 class="card-title">Informasi Kontak</h4>
                                                <p class="card-title-desc">Harap Masukan Informasi Kontak Pemesanan.</p>
                
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
                                                    <div class="col-md-10">
                                                        <input name="nama_pemesan" class="form-control" type="text" value="{{ old('nama_pemesan') }}"  id="example-text-input">
                                                        @error('nama_pemesan')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-tel-input" class="col-md-2 col-form-label">No.Hp (Whatsapp)</label>
                                                    <div class="col-md-10">
                                                        <input name="no_wa" class="form-control" type="tel" value="{{ old('no_wa') }}" id="example-tel-input" name="no_wa">
                                                        @error('no_wa')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-date-input" class="col-md-2 col-form-label">Pilih Tanggal Service</label>
                                                    <div class="col-md-10">
                                                        <input name="tanggal_pemesanan" class="form-control" type="date" value="{{ old('tanggal_pemesanan') }}" id="txtDate">
                                                        @error('tanggal_pemesanan')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label">Kecamatan</label>
                                                    <div class="col-md-10">
                                                        <select name="kecamatan" class="form-control" id="kecamatan-tegal" onchange="cariKelurahan()">
                                                            @error('kecamatan')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label">Kelurahan</label>
                                                    <div class="col-md-10">
                                                        <select name="kelurahan" class="form-control" id="kelurahan-tegal" onchange="">
                                                            @error('kelurahan')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-date-input" class="col-md-2 col-form-label">Alamat Lengkap</label>
                                                    <div class="col-md-10">
                                                        <textarea name="alamat" id="textarea" class="form-control" maxlength="225" rows="3" placeholder="Contoh Jl.Ahmad Yani gang 4 RT05/RW07">{{old('alamat')}}</textarea>
                                                        @error('alamat')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary form-control">Pesan Sekarang</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div> <!-- end col -->
            </div>
        </div>  
        @include('bengkel.layouts.script')
        <script>
            $('#kecamatan-tegal').on('change', function(){
                let idKecamatan = $(this).find(':selected').data('id')
                $.ajax({
                    type : "GET",
                    url : "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan="+idKecamatan,
                    dataType : 'json',
                    success : function(data) {
                        let html = ''
                        $.each(data.kelurahan, function(index, item){
                            html += `<option value=${item.nama} data-id="${item.id}">${item.nama}</option>`
                        })
                        $('#kelurahan-tegal').html(html)
                    }
                })
            })
            $(document).ready(function(){
                // https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=3376
                $.ajax({
                    type : "GET",
                    url : "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=3376",
                    dataType : 'json',
                    success : function(data) {
                        let html = '<option value="">Pilih kecamatan</option>';
                        $.each(data.kecamatan, function(index, item){
                            console.log(item)
                            html += `<option value=${item.nama} data-id="${item.id}">${item.nama}</option>`
                        })
                        $('#kecamatan-tegal').html(html)
                    }
                })
            })

            $(function(){
                var dtToday = new Date();

                var month = dtToday.getMonth() + 1;
                var day = dtToday.getDate();
                var year = dtToday.getFullYear();
                if(month < 10)
                    month = '0' + month.toString();
                if(day < 10)
                    day = '0' + day.toString();

                var minDate= year + '-' + month + '-' + day;

                $('#txtDate').attr('min', minDate);
            });

        </script>
    </body>
</html>


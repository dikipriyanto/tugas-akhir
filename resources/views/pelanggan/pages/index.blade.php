@extends('pelanggan.layouts.app')
@section('content')
@cloudinaryJS
<style>
    .list-item-bengkel:hover {
        background: #97f0e8
    }

    .btn-cari {
        width: 100%;
        background: #007bff;
        border-radius: 4px;
        margin: 8px 0;
        outline: none;
        padding: 8px;
        box-sizing: border-box;
        transition: 0.3s;
        color: white
    }

    .btn-cari:hover {
        width: 100%;
        background: #046fe1;
        color: white
    }

    #select-bengkel {
        width: 100%;
        border: 2px solid #aaa;
        border-radius: 4px;
        margin: 8px 0;
        outline: none;
        padding: 8px;
        box-sizing: border-box;
        transition: 0.3s;
    }

    #select-bengkel:focus {
        border-color: dodgerBlue;
        box-shadow: 0 0 8px 0 dodgerBlue;
    }

    .inputWithIcon #select-bengkel {
        padding-left: 20px;
    }

    .inputWithIcon {
        position: relative;
    }

    .inputWithIcon i {
        position: absolute;
        right: 2px;
        top: 8px;
        padding: 11px 8px 5px 5px;
        color: #aaa;
        transition: 0.3s;
    }

</style>
<div class="banner banner-3">
    <div class="container">
        <div class="card-body">
            <div class="page-content">
                {{-- <div class="container"> --}}
                <div class="banner-content">
                    <div class="row justify-content-center">
                        <h1>Pemesanan Tukang Service Elektronik
                        </h1>
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <label class="row justify-content-center">
                                        <p><strong>CARI BENGKEL SERVICE ELEKTRONIK</strong></p>
                                    </label>
                                    <form action="{{ route('caribengkel') }}">
                                        <div class="form-row">
                                            <div class="col-md-10">
                                                <div class="inputWithIcon">
                                                    <input type="text" class="" id="select-bengkel"
                                                        name="caribengkel" readonly placeholder="Pilih Bengkel Service">
                                                        <i class="fa fa-chevron-down fa-lg fa-fw" aria-hidden="true"></i>
                                                </div>
                                                <ul class="px-3 py-2 shadow" id="list-select-bengkel"
                                                    style="display: none">
                                                    @foreach ($kategori_services as $item)
                                                    <li class="flex my-2 p-2 list-item-bengkel" style="cursor: pointer"
                                                        data-name="{{ $item->nama_kategori }}">
                                                        <img src="{{ $item->foto }}" width="66" alt="">
                                                        <strong><label for="" class="ml-3">{{ $item->nama_kategori }}</label></strong>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-cari mb-10">CARI</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </div>  --}}
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
@if(Session::has('success'))
<script>
    Swal.fire({
        title: "Pendaftaran Berhasil!",
        text: "Silahkan Login!",
        type: "success",

        confirmButtonColor: "#556ee6"
    })

</script>
@endif

@if(Session::has('gagallogin'))
<script>
    Swal.fire({
        title: "Email atau password salah !",
        confirmButtonColor: "#556ee6"
    })

</script>
@endif
<script>
    $('#select-bengkel').focus(function () {
        $('#list-select-bengkel').show();
    });

    $('#list-select-bengkel').on('click', '.list-item-bengkel', function () {
        $('#select-bengkel').val($(this).data('name'))
        $('#list-select-bengkel').hide();
    });

</script>
@endsection

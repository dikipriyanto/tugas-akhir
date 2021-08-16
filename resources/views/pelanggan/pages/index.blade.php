@extends('pelanggan.layouts.app')
@section('content')
@cloudinaryJS
{{-- <style>
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

</style> --}}
<div class="banner banner-3">
    <div class="container">
        <div class="card-body">
            <div class="page-content">
                {{-- <div class="container"> --}}
                <div class="banner-content">
                    <div class="row justify-content-center">
                        <h1>Pemesanan Tukang Service Elektronik
                        </h1>
                        
                        {{-- <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <label class="row justify-content-center">
                                        <p><strong>CARI BENGKEL SERVICE ELEKTRONIK</strong></p>
                                    </label>
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-sm-4" stlye="height: 1000px">
                                            <div class="card shadow p-4">
                                                <div class="body">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <div class="" style="width: 65px">
                                                            <img src="https://res.cloudinary.com/dponfhau5/image/upload/v1626949672/KategoriService/2021-07-22%2010:27:47-Service%20Kulkas.png" alt="" srcset="" class="object-contain">
                                                            <img src="https://res.cloudinary.com/dponfhau5/image/upload/v1626949672/KategoriService/2021-07-22%2010:27:47-Service%20Kulkas.png" alt="" srcset="" class="object-contain">
                                                        </div>
                                                    </div>
                                                    <p class="text-center mt-3">BENKEL As</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                        </div> --}}
                    </div>
                </div>
                {{-- </div>  --}}
            </div>
        </div>
    </div>
</div>

<!-- product begin -->
<div class="product">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    @foreach ($kategori_services as $item)
                    <div class="col-xl-3 col-lg-3 col-sm-6">
                        <a href="{{ route('caribengkel',['caribengkel' => $item->nama_kategori]) }}">
                            <div class="single-product">
                            
                                <div class="d-flex justify-content-center align-items-center p-4">
                                    <img src="{{ $item->foto }}" alt="" width="112px" height="112px">
                                </div>
                                <div class="part-text">
                                    <a href="#">
                                        <span class="product-name">{{$item->nama_kategori}}</span>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach                   
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- product end -->

<!-- what are you waiting for begin -->
@if (session('token_pelanggan'))
@else
<div class="what-waiting">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-9 col-md-9">
                <div class="section-title">
                    {{-- <span class="subtitle">Your Revenue Sources Are Unlimited</span> --}}
                    <h2>Punya Keahlihan Service Barang Elektronik?</h2>
                    <p>Bergabunglah dengan platform kami sebagai penyedia jasa service elektronik jika anda mempunyai keahlihan dalam bidang service barang elektronik!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="single-box">
                    <div class="part-txt">
                        <h3>Daftar Sebagai Penyedia jasa ? </h3>
                        {{-- <p>The affiliate program is our special feature for loyal customers. Are you ready to start making money ? Join today and<br/> become an affiliate!</p> --}}
                        <a href="{{route('register')}}">Daftar</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="single-box">
                    <div class="part-txt">
                        <h3>Sudah Punya Akun ?</h3>
                        {{-- <p>You can get your referral link by logging in and going to our referral page.Share your unique referral link with friends, Your friend will get Todas Coupons .</p> --}}
                        <a href="{{route('loginbengkel1')}}">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- what are you waiting for end -->
@endif


<!-- footer begin -->
<div class="footer">
    <div class="container">
    </div>
    <div class="foot-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 d-xl-flex d-lg-flex d-block align-items-center">
                    <p class="copyright-text">Copyright © 2021. Pemesanan Tukang Service Elektronik</p>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="partners">
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="#" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="#" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="#" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="#" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="#" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer end -->

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

@if(Session::has('message'))
<script>
    Swal.fire({
        title: "Password berhasil dirubah !",
        text: "Silahkan Login!",
        type: "success",

        confirmButtonColor: "#556ee6"
    })

</script>
@endif

@if(Session::has('emailsalah'))
<script>
    Swal.fire({
            title: "Email Salah",
            // text: "Your imaginary file is safe :)",
            type: "error"
        })

    $('#exampleModal').modal({show:true})

</script>
@endif

@if(Session::has('passwordsalah'))
<script>
    Swal.fire({
            title: "Password Salah",
            // text: "Your imaginary file is safe :)",
            type: "error"
        })

    $('#exampleModal').modal({show:true})

</script>
@endif

{{-- <script>
    $('#select-bengkel').focus(function () {
        $('#list-select-bengkel').show();
    });

    $('#list-select-bengkel').on('click', '.list-item-bengkel', function () {
        $('#select-bengkel').val($(this).data('name'))
        $('#list-select-bengkel').hide();
    });

</script> --}}
@endsection

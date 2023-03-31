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

<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans);

body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
}

.search {
  width: 120%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #00B4CC;
  border-right: none;
  padding: 20px;
  height: 20px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #05090c;
}

.searchButton {
  width: 40px;
  height: 45px;
  border: 1px solid #2974ec;
  background: #1a93ea;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 30%;
  position: absolute;
  top: 70%;
  left: 48%;
  transform: translate(-50%, -50%);
}
</style>

<div class="banner banner-3">
    <div class="container">
        <div class="card-body">
            <div class="page-content">
                {{-- <div class="container"> --}}
                <div class="banner-content">
                    {{-- <div class="row justify-content-center"> --}}
                        {{-- <h1>Pemesanan Tukang Service Elektronik
                        </h1> --}}
                        <div class="d-flex justify-content-center px-5">
                            {{-- <div class="search"> 
                                <input type="text" class="search-input" placeholder="Cari bengkel service disini!" name=""> <a href="{{route('searchbengkel')}}" class="search-icon"> <i class="fa fa-search"></i> </a>
                            </div> --}}
                            <form action="{{route('searchbengkel')}}">
                            <div class="wrap">
                                <div class="search">
                                   <input type="text" name="searchbengkel" value="" class="searchTerm" placeholder="Cari bengkel service disini!">
                                   <button type="submit" class="searchButton">
                                     <i class="fa fa-search"></i>
                                  </button>
                                </div>
                            </div>
                        </form>
                        </div>
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

@if(Session::has('banned'))
<script>
    Swal.fire({
            title: "Oops...",
            text: "AKUN ANDA TELAH DINONAKTIFKAN",
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

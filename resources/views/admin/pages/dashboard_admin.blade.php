@extends('admin.layouts.app')
@section('content')
  <div class="row">
    <div class="col-xl-4">
      <div class="card overflow-hidden">
        <div class="bg-soft-primary">
            <div class="row">
                <div class="col-7">
                    <div class="text-primary p-3">
                        <h5 class="text-primary">SELAMAT DATANG !</h5>
                        <p>Dashboard Admin</p>
                    </div>
                </div>
                <div class="col-5 align-self-end">
                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="row">
                <div class="col-sm-4">
                    <div class="avatar-md profile-user-wid mb-4">
                        <img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                    </div>
                    <h5 class="font-size-13 text-truncate">ADMINISTRATOR</h5>
                    {{-- <p class="text-muted mb-0 text-truncate">ADMINISTRATOR!</p> --}}
                </div>

                <div class="col-sm-8">
                    <div class="pt-4">

                        <div class="row">
                            <div class="col-6">
                                <h5 class="font-size-15">{{ $totalPemesanan }}</h5>
                                <p class="text-muted mb-0">Keseluruhan Total Pemesanan</p>
                            </div>
                            <div class="col-6">
                                <h5 class="font-size-15">{{$pesananBerlangsung}}</h5>
                                <p class="text-muted mb-0">Total Pemesanan Berlangsung</p>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="{{route('editadmin')}}" class="btn btn-primary waves-effect waves-light btn-sm">Edit Profil <i class="mdi mdi-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-xl-8">
      <div class="row">
          <div class="col-md-4">
              <div class="card mini-stats-wid">
                  <div class="card-body">
                      <div class="media">
                          <div class="media-body">
                              <p class="text-muted font-weight-medium">Total Mitra Bengkel Service</p>
                              <h4 class="mb-0">{{$totalBengkel}}</h4>
                          </div>

                          <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                              <span class="avatar-title">
                                  <i class="bx bx-wrench font-size-24"></i>
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card mini-stats-wid">
                  <div class="card-body">
                      <div class="media">
                          <div class="media-body">
                              <p class="text-muted font-weight-medium">Total Akun Pelanggan</p>
                              <h4 class="mb-0">{{$totalPelanggan}}</h4>
                          </div>

                          <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                              <span class="avatar-title rounded-circle bg-primary">
                                  <i class="bx bx-user-plus font-size-24"></i>
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card mini-stats-wid">
                  <div class="card-body">
                      <div class="media">
                          <div class="media-body">
                              <p class="text-muted font-weight-medium">Total Pesanan Belum Dikonfirmasi</p>
                              <h4 class="mb-0">{{$pesananRequest}}</h4>
                          </div>

                          <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                              <span class="avatar-title rounded-circle bg-primary">
                                  <i class="bx bx-purchase-tag-alt font-size-24"></i>
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted font-weight-medium">Total Pesanan Selesai</p>
                            <h4 class="mb-0">{{$pesananSelesai}}</h4>
                        </div>

                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="bx bxs-detail font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="card mini-stats-wid">
              <div class="card-body">
                  <div class="media">
                      <div class="media-body">
                          <p class="text-muted font-weight-medium">Total Pesanan Batal</p>
                          <h4 class="mb-0">{{$pesananBatal}}</h4>
                      </div>

                      <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                          <span class="avatar-title rounded-circle bg-primary">
                              <i class="bx bxs-detail font-size-24"></i>
                          </span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
  </body>
  </html>
@endsection
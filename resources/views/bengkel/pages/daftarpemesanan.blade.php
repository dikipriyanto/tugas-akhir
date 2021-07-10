@extends('bengkel.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <div class="search-box mr-2 mb-2 d-inline-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <i class="bx bx-search-alt search-icon"></i>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-sm-8">
                        <div class="text-sm-right">
                            <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> Add New Order</button>
                        </div>
                    </div><!-- end col--> --}}
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th>Kode Pemesan</th>
                                <th>Nama</th>
                                <th>No HP/WA</th>
                                <th>Tanggal Pesanan</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Keluhan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($daftarpemesan as $item)
                            <tr>
                                <td>{{$item->kode_pemesanan}}</td>
                                <td>{{$item->nama_pemesan}}</td>
                                <td>{{$item->no_wa}}</td>
                                <td>{{$item->tanggal_pemesanan}}</td>
                                <td>{{$item->kecamatan}}</td>
                                <td>{{$item->kelurahan}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>
                                    <span class="badge badge-pill badge-soft-warning font-size-12">{{$item->status_pesanan}}</span>
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target=".exampleModal">
                                        Lihat Detail
                                    </button>
                                </td>
                                <td>
                                    <a href="{{route('editpesanan', $item->id)}}" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                    <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-size-18"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <ul class="pagination pagination-rounded justify-content-end mb-2">
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                            <i class="mdi mdi-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="javascript: void(0);" aria-label="Next">
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                    </li>
                </ul> --}}
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<!-- Modal -->
<div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keluhan Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-2">masalah :@foreach ($item->masalah_pesanan as $t)
                    {{$t->nama_masalah}}
                @endforeach</p>
                <p class="mb-2">merek :@foreach ($item->merek_pesanan as $t)
                    {{$t->nama_merek}}
                @endforeach</p>
                <p class="mb-2">jenis :@foreach ($item->jenis_pesanan as $t)
                    {{$t->nama_jenis}}
                @endforeach</p>
                <p class="mb-2">Informasi Tambahan :@foreach ($daftarpemesan as $item)
                    {{$item->informasi_tambahan}}
                @endforeach</p>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap">
                        <thead>
                            <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-sm">
                                    </div>
                                </th>
                                <td>
                                    <div>
                                        <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                        <p class="text-muted mb-0">$ 225 x 1</p>
                                    </div>
                                </td>
                                <td>$ 255</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <img src="assets/images/product/img-4.png" alt="" class="avatar-sm">
                                    </div>
                                </th>
                                <td>
                                    <div>
                                        <h5 class="text-truncate font-size-14">Hoodie (Blue)</h5>
                                        <p class="text-muted mb-0">$ 145 x 1</p>
                                    </div>
                                </td>
                                <td>$ 145</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h6 class="m-0 text-right">Sub Total:</h6>
                                </td>
                                <td>
                                    $ 400
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h6 class="m-0 text-right">Shipping:</h6>
                                </td>
                                <td>
                                    Free
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h6 class="m-0 text-right">Total:</h6>
                                </td>
                                <td>
                                    $ 400
                                </td>
                            </tr>
                        </tbody> --}}
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('bengkel.layouts.app')
@include('bengkel.layouts.head')
@section('content')
<body>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Pemesanan</h4>
                    <form action="{{route('updatepesanan')}}" method="post">
                        @csrf
                        <input type="hidden" name="id"  value="{{ $daftarpemesan->id }}">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Status Pesanan</label>
                            <div class="col-md-10">
                                <select name="status_pesanan" class="form-control">
                                    <option value="proses" >Proses</option>
                                    <option value="selesai">Selesai</option>
                                    <option value="batal">Batal</option>
                                </select>
                            </div>
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
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                    
                {{-- <h4 class="card-title">Edit Pemesanan</h4> --}}
                    
                <form action="{{route('estimasiBiaya', $daftarpemesan->id)}}" method="post" >
                    @csrf
                <input type="hidden" name="id"  value="{{ $daftarpemesan->id }}">

                <h4 class="card-title">Estimasi Biaya</h4>

                <div class="form-group row">
                    <label  class="col-md-2 col-form-label">Biaya Service</label>
                    <div class="col-md-10">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">RP</span>
                            </div>
                            <input name="biaya_service" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" id="biaya-service" 
                            onkeyup="return totalBiaya(parseInt(this.value), parseInt(document.querySelector('#biaya-sparepart').value), parseInt( document.querySelector('#biaya-kedatangan').value) )">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-md-2 col-form-label">Biaya Sparepart</label>
                    <div class="col-md-10">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">RP</span>
                            </div>
                            <input name="biaya_sparepart" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" id="biaya-sparepart" onkeyup="return totalBiaya(parseInt(document.querySelector('#biaya-service').value), parseInt(this.value), parseInt(document.querySelector('#biaya-kedatangan').value) )">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-md-2 col-form-label">Biaya Kedatangan</label>
                    <div class="col-md-10">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">RP</span>
                            </div>
                            <input name="biaya_kedatangan" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" id="biaya-kedatangan" onkeyup="return totalBiaya(parseInt(document.querySelector('#biaya-service').value), parseInt(document.querySelector('#biaya-sparepart').value), parseInt(this.value) )">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-md-2 col-form-label">Total Biaya</label>
                    <div class="col-md-10">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">RP</span>
                            </div>
                            <input name="total_biaya" type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="total-biaya">
                        </div>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                            Tambah
                        </button>
                    </div>
                </div>

                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Daftar Biaya</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Biaya Service</th>
                        <th>Biaya Sparepart</th>
                        <th>Biaya Kedatangan</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($daftarpemesan->estimasi_biaya as $t)
                    <tr>
                        <td>RP {{$t->biaya_service}}.000</td>
                        
                        <td>RP {{$t->biaya_sparepart}}.000</td>

                        <td>RP {{$t->biaya_kedatangan}}.000</td>

                        <td>RP {{$t->total_biaya}}.000</td>

                        <td>
                            <a href="{{route('editBiaya', $t->id)}}" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                            <a href="#" onclick="deleteRow({{$t->id}})" class="text-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-size-18"></i></a>
                            <form action="{{ route('hapusbiaya', $t->id) }}" method="post" id="form-hapus-{{$t->id}}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                            </form> 
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<!-- end row -->

</body>
@endsection

<script>
    function totalBiaya(biayaService, biaySparepart, biayaKedatangan){
        let totalBiaya = biayaService + biaySparepart + biayaKedatangan
        document.querySelector('#total-biaya').value = totalBiaya
    }
</script>
@section('script')
<script>
    function deleteRow(id) {
        swal({
            title: "Apa anda yakin?",
            text: "Data akan terhapus secara permanen !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $('#form-hapus-'+id).submit();
            }
        })
    }
</script>

<script>
    Swal.fire({
        title:"Are you sure?",
        text:"You won't be able to revert this!",
        type:"warning",
        showCancelButton:!0,
        confirmButtonColor:"#34c38f",
        cancelButtonColor:"#f46a6a",
        confirmButtonText:"Yes, delete it!"
    }).then(function(t) {
            t.value && Swal.fire("Deleted!", "Your file has been deleted.", "success")
    })
    
</script>

@endsection




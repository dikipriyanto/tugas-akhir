@extends('bengkel.layouts.app')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                    
                {{-- <h4 class="card-title">Edit Pemesanan</h4> --}}
                    
                <form action="{{route('updatebiaya')}}" method="post" >
                    @csrf
                <input type="hidden" name="id"  value="{{$editbiaya->id}}">
                <h4 class="card-title">Edit Estimasi Biaya</h4>

                <div class="form-group row">
                    <label  class="col-md-2 col-form-label">Biaya Service</label>
                    <div class="col-md-10">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">RP</span>
                            </div>
                            <input name="biaya_service"  type="number" value="{{ $editbiaya->biaya_service }}" class="form-control" aria-label="Amount (to the nearest dollar)" id="biaya-service" 
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
                            <input name="biaya_sparepart" type="number"  value="{{ $editbiaya->biaya_sparepart }}" class="form-control" aria-label="Amount (to the nearest dollar)" id="biaya-sparepart" onkeyup="return totalBiaya(parseInt(document.querySelector('#biaya-service').value), parseInt(this.value), parseInt(document.querySelector('#biaya-kedatangan').value) )">
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
                            <input name="biaya_kedatangan" type="number" value="{{ $editbiaya->biaya_kedatangan }}" class="form-control" aria-label="Amount (to the nearest dollar)" id="biaya-kedatangan" onkeyup="return totalBiaya(parseInt(document.querySelector('#biaya-service').value), parseInt(document.querySelector('#biaya-sparepart').value), parseInt(this.value) )">
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
                            Simpan
                        </button>
                    </div>
                </div>

                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div>

<!-- end row -->
@endsection
<script>
    function totalBiaya(biayaService, biaySparepart, biayaKedatangan){
        let totalBiaya = biayaService + biaySparepart + biayaKedatangan
        document.querySelector('#total-biaya').value = totalBiaya
    }
</script>
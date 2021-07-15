<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pelanggan;

class riwayatPesanan extends Model
{
    protected $guarded=[];
    // protected $fillable = [
    //     'id_bengkel_service',
    //     'id_pelanggan',
    //     'kode_pemesanan',
    //     'nama_pemesan',
    //     'tanggal_pemesanan',
    //     'status_pesanan',
    //     'total_biaya',
    // ];
    
    public function total_biaya(){
        return $this->sum('total_biaya');
    }

}
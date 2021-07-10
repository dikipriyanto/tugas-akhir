<?php

namespace App\Models;
use App\Models\pemesanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimasi_biaya extends Model
{
    public function pemesanan()
    {
        return $this->belongsTo(pemesanan::class,'id_pesanan');
    }

    protected $fillable = [
        'biaya_service',
        'biaya_sparepart',
        'biaya_kedatangan',
        'total_biaya',
        'id_pesanan',
    ];

}

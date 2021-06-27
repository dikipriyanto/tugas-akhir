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
}

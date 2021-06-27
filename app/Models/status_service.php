<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pemesanan;

class status_service extends Model
{
    public function pemesanan()
    {
        return $this->belongsTo(pemesanan::class,'id_pesanan');
    }

    protected $fillable = [
        'nama_pelanggan',
        'tanggal_pemesanan',
        'status_pesanan',
        'id_pesanan',
    ];
}

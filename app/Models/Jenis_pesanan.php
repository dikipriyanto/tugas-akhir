<?php

namespace App\Models;
use App\Models\pemesanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_pesanan extends Model
{
    public function pemesanan()
    {
        return $this->belongsTo(pemesanan::class,'id_pesanan');
    }

    protected $fillable = [
        'nama_jenis',
        'id_pesanan',
    ];
}

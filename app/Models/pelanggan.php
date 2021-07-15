<?php

namespace App\Models;
use App\Models\pemesanan;
use App\Models\riwayatPesanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{

    public $table = "pelanggan";

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'email',
        'password',
        'token',
    ];

    public function pemesanan()
    {
        return $this->hasMany(pemesanan::class,'id_pelanggan');
    }
}

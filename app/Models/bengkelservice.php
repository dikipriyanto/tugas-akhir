<?php

namespace App\Models;
use  App\Models\pemesanan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bengkelservice extends Model
{

    public $table = "bengkelservice";

    protected $fillable = [
        'nama_lengkap',
        'nama_jasa_service',
        'alamat_lengkap',
        'no_telepon',
        'nama_kategori',
        'email',
        'password',
        'token',
        'deskripsi',
    ];

    public function pemesanan()
    {
        return $this->hasMany(pemesanan::class,'id_bengkel_service');
    }
}

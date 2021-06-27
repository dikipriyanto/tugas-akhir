<?php

namespace App\Models;
use App\Models\masalah_pesanan;
use App\Models\jenis_pesanan;
use App\Models\merek_pesanan;
use App\Models\estimasi_biaya;
use App\Models\bengkelservice;
use App\Models\status_service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_pemesanan',
        'nama_pemesan',
        'no_wa',
        'tanggal_pemesanan',
        'kecamatan',
        'kelurahan',
        'alamat',
        'id_bengkel_service',
        'status_pesanan',
        'informasi_tambahan',
    ];

    public function masalah_pesanan()
    {
        return $this->hasMany(masalah_pesanan::class,'id_pesanan');
    }

    public function jenis_pesanan()
    {
        return $this->hasMany(jenis_pesanan::class,'id_pesanan');
    }

    public function merek_pesanan()
    {
        return $this->hasMany(merek_pesanan::class,'id_pesanan');
    }

    public function estimasi_biaya()
    {
        return $this->hasMany(estimasi_biaya::class,'id_pesanan');
    }

    public function bengkelservice()
    {
        return $this->belongsTo(bengkelservice::class,'id_bengkel_service');
    }

    public function status_service()
    {
        return $this->hasMany(status_service::class,'id_pesanan');
    }
}

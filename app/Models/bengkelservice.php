<?php

namespace App\Models;
use  App\Models\pemesanan;
use  App\Models\rating;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VerifyBengkel;

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
        'logo',
        'public_id',
        'deskripsi',
        'status',
        'available'
    ];

    public function pemesanan()
    {
        return $this->hasMany(pemesanan::class,'id_bengkel_service');
    }
    
    public function rating()
    {
        return $this->hasMany(rating::class, 'id_bengkel');
    }

    public function VerifyBengkel()
    {
        return $this->hasMany(VerifyBengkel::class);
    }
}

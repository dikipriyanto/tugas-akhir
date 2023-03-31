<?php

namespace App\Models;
// use app\Models\rating;
use app\Models\bengkelservice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pemesanan;
use App\Models\pelanggan;

class Rating extends Model
{
    use HasFactory;
    protected $table ='ratings';
    protected $fillable = [
        'id_pemesanan',
        'id_bengkel',
        'id_pelanggan',
        'stars_rated',
        "review"
    ];

    public function pemesanan()
    {
        return $this->belongsTo(pemesanan::class,'id_pemesanan');
    }

    public function bengkelservice()
    {
        return $this->belongsTo(bengkelservice::class,'id_bengkel_service');
    }

    public function pelanggan(){
        return $this->belongsTo(pelanggan::class, 'id_pelanggan');
    }

    
}

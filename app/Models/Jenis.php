<?php

namespace App\Models;
use App\Models\kategori_service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $fillable = [
        'nama_jenis',
        'kategori_id',
    ];

    public function kategori_service()
    {
        return $this->belongsTo(kategori_service::class, 'kategori_id');
    }
}

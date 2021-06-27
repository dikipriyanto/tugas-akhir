<?php

namespace App\Models;
use App\Models\masalah;
use App\Models\merek;
use App\Models\jenis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\kategori_service;

class kategori_service extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function masalah()
    {
        return $this->hasMany(masalah::class,'kategori_id');
    }

    public function merek()
    {
        return $this->hasMany(merek::class,'kategori_id');
    }

    public function jenis()
    {
        return $this->hasMany(jenis::class,'kategori_id');
    }
}

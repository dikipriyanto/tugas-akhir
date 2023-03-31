<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\bengkelservice;

class VerifyBengkel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function bengkelservice()
    {
        return $this->belongsTo(bengkelservice::class,'id_bengkel_service');
    }
}

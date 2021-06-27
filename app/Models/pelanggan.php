<?php

namespace App\Models;

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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{

    public $table = "admin";

    protected $fillable = [
        'email',
        'password',
        'token',
    ];
}
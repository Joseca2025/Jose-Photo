<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarjeta_credito extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'fecha',
        'cvc',
        'iduser'
    ];
}

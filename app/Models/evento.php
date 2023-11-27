<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'fecha',
        'hora',
        'idorganizador',
        'idfotografo',
        'idqr',
        'idcatalogo'
    ];
}


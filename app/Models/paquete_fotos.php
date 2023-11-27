<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paquete_fotos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'idfotografo',
        'precio',
        'posicion'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catalogo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'idfotografo',
        'precio_foto',
        'cantidad_foto',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notificacion_contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'idorganizador',
        'idfotografo',
        'idevento',
        'idpaquete_foto',
        'idaceptado'
    ];
}

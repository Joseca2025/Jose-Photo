<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto_perfil extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto1',
        'foto2',
        'foto3',
        'posicion',
        'iduser'
    ];
}

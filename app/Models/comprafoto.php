<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comprafoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'iduser',
        'idfotografia',
        'idevento'
    ];


}

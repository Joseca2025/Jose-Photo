<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class qr extends Controller
{
    public function escanearqr(){
        return view('usuario.escanear-qr');
    }
}

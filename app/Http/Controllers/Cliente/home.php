<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\paquete as paque;
use Illuminate\Http\Request;

class home extends Controller
{
    public function index(){
        if(count(auth()->user()->getRoleNames()) == 0){
            $paquetes = paque::all();
            return view('dashboard', compact('paquetes'));
        }
        if (auth()->user()->getRoleNames()[0] == 'cliente') {
            $usuario = auth()->user();
            return view('cliente.home', compact('usuario'));
        }
    }
}

<?php

namespace App\Http\Controllers\Fotografo;

use App\Http\Controllers\Controller;
use App\Models\paquete as paque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class solicitudes extends Controller
{
    public function solicitud($idnoti){
        if(count(auth()->user()->getRoleNames()) == 0){
            $paquetes = paque::all();
            return view('dashboard', compact('paquetes'));
        }
        if (auth()->user()->getRoleNames()[0] == 'fotografo') {
            $notificacion = DB::table('notificacion_contratos')->where('id', $idnoti )->first();
            return view('fotografo.solicitudes', compact('notificacion'));
        }
    }
}

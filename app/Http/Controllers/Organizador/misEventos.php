<?php

namespace App\Http\Controllers\Organizador;

use App\Http\Controllers\Controller;
use App\Models\evento;
use App\Models\organizador;
use Illuminate\Http\Request;
use App\Models\paquete as paque;
use Illuminate\Support\Facades\DB;

class misEventos extends Controller
{
    public function index()
    {
        if (count(auth()->user()->getRoleNames()) == 0) {
            $paquetes = paque::all();
            return view('dashboard', compact('paquetes'));
        }
        if (auth()->user()->getRoleNames()[0] == 'organizador') {

            // $idorganizador = DB::table('organizadors')->where('iduser', auth()->user()->id)->first();
            // $eventos = DB::table('eventos')->where('idorganizador', $idorganizador->id)->get();

           return view('organizador.misEventos.index');
        }
    }

    public function tablaFotografos($id)
    {
        if (count(auth()->user()->getRoleNames()) == 0) {
            $paquetes = paque::all();
            return view('dashboard', compact('paquetes'));
        }
        if (auth()->user()->getRoleNames()[0] == 'organizador') {

            $evento = evento::find($id);
           return view('organizador.misEventos.lista-fotografos', compact('evento'));
        }
    }

    public function listaSolicitudes($id)
    {
        if (count(auth()->user()->getRoleNames()) == 0) {
            $paquetes = paque::all();
            return view('dashboard', compact('paquetes'));
        }
        if (auth()->user()->getRoleNames()[0] == 'organizador') {

            $evento = evento::find($id);
           return view('organizador.misEventos.lista-solicitudes', compact('evento'));
        }
    }

    public function catalogo($id)
    {
        if (count(auth()->user()->getRoleNames()) == 0) {
            $paquetes = paque::all();
            return view('dashboard', compact('paquetes'));
        }
        if (auth()->user()->getRoleNames()[0] == 'organizador') {

            $evento = evento::find($id);
           return view('organizador.misEventos.show-catalogo', compact('evento'));
        }
    }
}

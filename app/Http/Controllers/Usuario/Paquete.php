<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\cliente;
use App\Models\comprafoto;
use App\Models\evento;
use App\Models\foto_perfil;
use App\Models\fotografia;
use App\Models\fotografo;
use App\Models\notificacion_faceapi;
use App\Models\organizador;
use App\Models\paquete as ModelsPaquete;
use App\Models\paquete_fotos;
use App\Models\tarjeta_credito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


class Paquete extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function vistaPago(Request $request, $id)
    {

        if (auth()->user()->idpaquete == 0) {
            $paquete = DB::table('paquetes')->where('id', $id)->first();
            $user = auth()->user();
            $existe = DB::table('tarjeta_creditos')->where('iduser', $user->id)->first();
            if ($existe == null) {
                return view('pagos.registroTarjetaC', compact('paquete'));
            } else {
                return view('pagos.pagoPaquete', compact('paquete'));
            }
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function guardarTarjetaC(Request $request, $id)
    {
        $request->validate([
            'numero' => ['required', 'string', 'min:16', 'max:16'],
            'fecha' => ['required', 'string', 'min:4', 'max:5'],
            'cvc' => ['required', 'string', 'min:3', 'max:3'],
        ]);
        tarjeta_credito::create([
            'numero' => $request->numero,
            'fecha' => $request->fecha,
            'cvc' => $request->cvc,
            'iduser' => auth()->user()->id
        ]);

        return redirect()->route('paquete.vistaPago', compact('id'));
    }




    public function UsuarioEscogeRol(Request $request, $id)
    {
        $paquete = DB::table('paquetes')->where('id', $id)->first();
        DB::table('users')->where('id', auth()->user()->id)->update(['idpaquete' => $paquete->id]);

        auth()->user()->assignRole($paquete->nombre);
        //Herencia de Usuarios
        if ($paquete->nombre = 'cliente') {
            cliente::create([
                'iduser' => auth()->user()->id
            ]);
        }

        if ($paquete->nombre == 'fotografo') {

            $fotografo = fotografo::create([
                'iduser' => auth()->user()->id
            ]);

            paquete_fotos::create([
                'nombre' => 'paquete 1',
                'descripcion' => 'no definida',
                'idfotografo' => $fotografo->id,
                'precio' => 0,
                'posicion' => 1

            ]);

            paquete_fotos::create([
                'nombre' => 'paquete 2',
                'descripcion' => 'no definida',
                'idfotografo' => $fotografo->id,
                'precio' => 0,
                'posicion' => 2

            ]);

            paquete_fotos::create([
                'nombre' => 'paquete 3',
                'descripcion' => 'no definida',
                'idfotografo' => $fotografo->id,
                'precio' => 0,
                'posicion' => 3
            ]);
        }

        if ($paquete->nombre == 'organizador') {
            organizador::create([
                'iduser' => auth()->user()->id
            ]);
        }

        foto_perfil::create([
            'iduser' => auth()->user()->id,
            'posicion' => 1

        ]);

        foto_perfil::create([
            'iduser' => auth()->user()->id,
            'posicion' => 2

        ]);

        foto_perfil::create([
            'iduser' => auth()->user()->id,
            'posicion' => 3

        ]);

        return redirect()->route('dashboard');
    }

    public function catalogos()
    {
        return view('catalogos.index');
    }

    public function catalogoVista($id)
    {
        $evento = evento::where('id', $id)->first();
        $idorga = DB::table('organizadors')->where('id', $evento->idorganizador)->first();
        $organizador = DB::table('users')->where('id', $idorga->iduser)->first();

        $idfoto = DB::table('fotografos')->where('id', $evento->idfotografo)->first();
        $fotografo = DB::table('users')->where('id', $idfoto->iduser)->first();
        return view('catalogos.catalogoEvento', compact('evento', 'organizador', 'fotografo'));
    }

    public function catalogoPorQr($id)
    {
        $evento = evento::where('id', $id)->first();
        $idorga = DB::table('organizadors')->where('id', $evento->idorganizador)->first();
        $organizador = DB::table('users')->where('id', $idorga->iduser)->first();

        $idfoto = DB::table('fotografos')->where('id', $evento->idfotografo)->first();
        $fotografo = DB::table('users')->where('id', $idfoto->iduser)->first();
        return view('catalogos.catalogoPorQr', compact('evento', 'organizador', 'fotografo'));
    }

    public function eventosFotosCompradas()
    {
        return view('compras.eventosfotoscompradas');
    }

    public function listaFotosCompradas($idevento)
    {
        return view('compras.listafotoscompradas', compact('idevento'));
    }

    public function aparecesFoto($notificacion)
    {
        $noti = notificacion_faceapi::where('id', $notificacion)->first();
        $idevento = $noti->idevento;
        $noti->delete();

        return redirect()->route('usuarios.catalogo-vista', $idevento);
    }

}

<?php

namespace App\Http\Livewire\Fotografo\Perfil;

use App\Models\catalogo;
use App\Models\notificacion_contrato;
use App\Models\qr;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class Solicitud extends Component
{
    public $idnotificacion;
    public $aceptar = false;
    public $rechazar = false;

    protected $listeners = ["generarQr"];

    public function generarQr($imagen, $idevento)
    {
        $qr = qr::create([
            'imagen' => $imagen,
        ]);
        DB::table('eventos')->where('id', $idevento)->update(['idqr' => $qr->id]);
    }


    public function mount($notificacion)
    {
        $this->idnotificacion = $notificacion;
    }


    public function aceptarSolicitud($idnoti)
    {


        $notify = DB::table('notificacion_contratos')->where('id', $idnoti)->first();

        DB::table('notificacion_contratos')->where('id', $idnoti)->update(['estado' => 'aceptado']);

        DB::table('eventos')->where('id', $notify->idevento)->update(['idfotografo' => $notify->idfotografo]);


        $evento =  DB::table('eventos')->where('id', $notify->idevento)->first();

        $this->emit('crear-qr');

        $catalogo = catalogo::create([
            'nombre' => $evento->nombre,
            'idfotografo' => $notify->idfotografo,
        ]);

        DB::table('eventos')->where('id', $notify->idevento)->update(['idcatalogo' => $catalogo->id]);


        $espera = notificacion_contrato::where('idevento', $notify->idevento)->where('estado', 'espera')->get();

        foreach ($espera as $key) {
            $key->delete();
        }

        event( new \App\Events\respuestaNotificacion($idnoti));
        event( new \App\Events\actualizarVistaEventos() );
        return redirect()->route('dashboard');
    }



    public function rechazarSolicitud($idnoti)
    {
        DB::table('notificacion_contratos')->where('id', $idnoti)->update(['estado' => 'rechazado']);

        event(new \App\Events\respuestaNotificacion($idnoti));
        return redirect()->route('dashboard');
    }
    
    public function render()
    {
        $notificacion = DB::table('notificacion_contratos')->where('id', $this->idnotificacion)->first();
        return view('livewire..fotografo.perfil.solicitud', compact('notificacion'));
    }
}

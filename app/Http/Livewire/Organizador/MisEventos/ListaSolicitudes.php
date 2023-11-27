<?php

namespace App\Http\Livewire\Organizador\MisEventos;

use App\Events\notificacion_contrato;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListaSolicitudes extends Component
{

    protected $listeners = ["respuestaRecibida"];

    public $solicitudes;
    public $idevento;

    public function respuestaRecibida($idnoti){
        $this->solicitudes = DB::table('notificacion_contratos')->where('idevento', $this->idevento)->get();
    }

    public function mount($idevento){
        $this->idevento = $idevento;
        $this->solicitudes = DB::table('notificacion_contratos')->where('idevento', $idevento)->get();
    }

    public function eliminar($idsolicitud){
        DB::table('notificacion_contratos')->delete($idsolicitud);
        $this->solicitudes = DB::table('notificacion_contratos')->where('idevento', $this->idevento)->get();
    }

    public function render()
    {
        return view('livewire..organizador.mis-eventos.lista-solicitudes');
    }
}

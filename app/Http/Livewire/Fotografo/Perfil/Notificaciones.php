<?php

namespace App\Http\Livewire\Fotografo\Perfil;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Notificaciones extends Component
{

    public $notificaciones;

    protected $listeners = ["notificacionRec"];

    public function notificacionRec($notificacion){

        $idfotografo = DB::table('fotografos')->where('iduser', auth()->user()->id)->value('id');
        $this->notificaciones = DB::table('notificacion_contratos')->where('idfotografo', $idfotografo)->where('estado', 'espera')
        ->orderBy('id', 'desc')->get();
    }

    

    public function mount(){
        $idfotografo = DB::table('fotografos')->where('iduser', auth()->user()->id)->value('id');
        $this->notificaciones = DB::table('notificacion_contratos')->where('idfotografo', $idfotografo)->where('estado', 'espera')
        ->orderBy('id', 'desc')->get();
    }



    public function render()
    {
        return view('livewire..fotografo.perfil.notificaciones');
    }
}

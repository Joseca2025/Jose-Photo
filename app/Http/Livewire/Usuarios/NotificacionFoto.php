<?php

namespace App\Http\Livewire\Usuarios;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NotificacionFoto extends Component
{
    public $notificaciones;

    protected $listeners = ["notificacionFaceApiRecibida"];

    public function notificacionFaceApiRecibida($ideven)
    {
        $this->notificaciones = DB::table('notificacion_faceapis')->where('iduser', auth()->user()->id)->orderBy('id', 'desc')->get();
    }

    public function mount(){
        $this->notificaciones = DB::table('notificacion_faceapis')->where('iduser', auth()->user()->id)->orderBy('id', 'desc')->get();
    }

    public function render()
    {
        return view('livewire..usuarios.notificacion-foto');
    }
}

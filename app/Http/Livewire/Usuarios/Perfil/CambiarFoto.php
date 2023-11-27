<?php

namespace App\Http\Livewire\Usuarios\Perfil;

use App\Models\foto_perfil;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CambiarFoto extends Component
{
    public $imagenes = [];

    protected $listeners = ["recargar"];

    public function recargar(){
        $usuario = DB::table('users')->where('id', auth()->user()->id)->first();
        $this->imagenes = foto_perfil::where('iduser', $usuario->id)->get();
    }
    
    public function mount()
    {
        $usuario = DB::table('users')->where('id', auth()->user()->id)->first();
        $this->imagenes = foto_perfil::where('iduser', $usuario->id)->get();
    }

    public function descargar($id)
    {
        $foto = foto_perfil::where('id', $id)->first();
        $url = str_replace('storage', 'public', $foto->ruta);
        return Storage::download($url);
    }

    public function render()
    {
        return view('livewire..usuarios.perfil.cambiar-foto');
    }
}

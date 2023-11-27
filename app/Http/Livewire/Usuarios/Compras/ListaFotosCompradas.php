<?php

namespace App\Http\Livewire\Usuarios\Compras;

use App\Models\comprafoto;
use App\Models\evento;
use App\Models\fotografia;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ListaFotosCompradas extends Component
{
    public $idevento;


    public function mount($idevento)
    {
        $this->idevento = $idevento;
    }

    public function descargar($id)
    {
        $foto = fotografia::where('id', $id)->first();
        $url = str_replace('storage', 'public', $foto->ruta);
        return Storage::download($url);
    }


    public function render()
    {
        $listaCompras = comprafoto::where('iduser', auth()->user()->id)->where('idevento', $this->idevento)->get();
        $evento = evento::where('id', $this->idevento)->first();
        return view('livewire..usuarios.compras.lista-fotos-compradas', compact('listaCompras', 'evento'));
    }
}

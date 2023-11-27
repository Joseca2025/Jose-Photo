<?php

namespace App\Http\Livewire\Usuarios\Catalogo;

use App\Models\fotografia;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CatalogoPorQr extends Component
{
    public $idevento;


    public function mount($idevento)
    {
        $this->idevento = $idevento;
        //dd($this->eventos);
    }

    public function render()
    {
        $evento = DB::table('eventos')->where('id', $this->idevento)->first();
        $fotografias = fotografia::where('idcatalogo', $evento->idcatalogo)->where('tipo', 'qr')->get();
        return view('livewire..usuarios.catalogo.catalogo-por-qr', compact('fotografias', 'evento'));
    }
}

<?php

namespace App\Http\Livewire\Organizador\MisEventos;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowCatalogo extends Component
{
    public $idevento;
    public $nombreEvento;
    public $imagenes;


    public function mount($evento) {
        $this->idevento = $evento;
        $evento = DB::table('eventos')->where('id', $this->idevento)->first();
        $this->imagenes = DB::table('fotografias')->where('idcatalogo', $evento->idcatalogo)->where('tipo', 'publica')->get();
    }

    public function render()
    {
        $evento = DB::table('eventos')->where('id', $this->idevento)->first();

        return view('livewire..organizador.mis-eventos.show-catalogo', compact('evento'));
    }
}

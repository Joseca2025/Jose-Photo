<?php

namespace App\Http\Livewire\Fotografo\Catalogo\Ventas;

use App\Models\comprafoto;
use App\Models\evento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChartEstatico extends Component
{

    public $idevento;

    public function mount($idev){
        $this->idevento = $idev;
    }

    public function render()
    {
        $fotos = DB::table('comprafotos')->where('idevento', $this->idevento)->get();
        $evento = DB::table('eventos')->where('id', $this->idevento)->first();

        $datodinero = comprafoto::join('fotografias','comprafotos.idfotografia','fotografias.id')
        ->where('comprafotos.idevento', $this->idevento)
        ->select(
            'fotografias.id as idfotografia',
            'fotografias.precio as precio',
        )->get();

        $datousuario = comprafoto::join('fotografias','comprafotos.idfotografia','fotografias.id')
        ->where('comprafotos.idevento', $this->idevento)
        ->select(
            'comprafotos.iduser as iduser',
        )->distinct('iduser')->get();

        $nroUsuario = $datousuario->count();

        $dinero = 0;
        $usuarios = 0;
        foreach($datodinero as $key){
            $dinero = $dinero + $key->precio;
        }

        $nroFotos = $datodinero->count();

        return view('livewire..fotografo.catalogo.ventas.chart-estatico', compact('dinero', 'nroUsuario', 'nroFotos'));
    }
}

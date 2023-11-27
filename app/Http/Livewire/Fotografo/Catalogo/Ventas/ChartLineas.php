<?php

namespace App\Http\Livewire\Fotografo\Catalogo\Ventas;

use App\Models\comprafoto;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChartLineas extends Component
{
    public $idevento;

    public function mount($idev)
    {
        $this->idevento = $idev;
    }


    public function render()
    {
        $nombres = comprafoto::join('fotografias', 'comprafotos.idfotografia', 'fotografias.id')
            ->join('users', 'comprafotos.iduser', 'users.id')
            ->where('comprafotos.idevento', $this->idevento)
            ->select(
                'users.name as nombre',
            )->distinct('iduser')->orderBy('comprafotos.iduser')->get();

        $fotos = comprafoto::select(DB::raw("COUNT(idfotografia) as count"))
            ->groupBy('iduser')->orderBy('iduser')
            ->where('comprafotos.idevento', $this->idevento)->pluck("count");

        return view('livewire..fotografo.catalogo.ventas.chart-lineas', compact('nombres', 'fotos'));
    }
}

<?php

namespace App\Http\Livewire\Usuarios\Compras;

use App\Models\comprafoto;
use Livewire\Component;
use Livewire\WithPagination;


class ListaEventosCompra extends Component
{
    use WithPagination;
    public $search;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $auth = auth()->user()->id;
        $eventos = comprafoto::join('eventos', 'eventos.id', 'comprafotos.idevento')
        ->join('organizadors', 'eventos.idorganizador', 'organizadors.id')
        ->join('users', 'organizadors.iduser', 'users.id')->distinct('eventos.id')
        ->where('comprafotos.iduser', $auth)
        ->select(
            'eventos.id as idevento',
            'eventos.nombre as nombre',
            'eventos.direccion as direccion',
            'eventos.fecha as fecha',
            'users.name as organizador'
        )     
        ->where(function ($query) use ($auth) {
            return $query->where('comprafotos.iduser', $auth)
                ->where('eventos.nombre', 'like', '%' . $this->search . '%');
        })
        ->orWhere(function ($query) use ($auth) {
            return $query->where('comprafotos.iduser', $auth)
                ->where('eventos.direccion', 'like', '%' . $this->search . '%');
        })
        ->orWhere(function ($query) use ($auth) {
            return $query->where('comprafotos.iduser', $auth)
                ->where('eventos.fecha', 'like', '%' . $this->search . '%');
        })
        ->orWhere(function ($query) use ($auth) {
            return $query->where('comprafotos.iduser', $auth)
                ->where('users.name', 'like', '%' . $this->search . '%');
        })->get();
        //dd($eventos);
        return view('livewire..usuarios.compras.lista-eventos-compra', compact('eventos'));
    }
}

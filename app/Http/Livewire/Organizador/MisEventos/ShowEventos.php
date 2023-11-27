<?php

namespace App\Http\Livewire\Organizador\MisEventos;

use App\Models\evento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;


class ShowEventos extends Component
{
    use WithPagination;
    public $search;

    //escucha el evento [___ => ] y ejecuta el metodo [ , ___]
    protected $listeners = ['render' => 'render', 'actualizarEventos'];

    public $idorganizador;

    public function mount()
    {
        $this->idorganizador = DB::table('organizadors')->where('iduser', auth()->user()->id)->value('id');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function actualizarEventos($data)
    {
        $this->idorganizador = DB::table('organizadors')->where('iduser', auth()->user()->id)->value('id');
    }


    public function render()
    {
        $idorganizador = $this->idorganizador;

        // WHERE (a = 1 AND b =1 ) or (c = 1 AND d = 1)

        $eventos = evento::where(function ($query) use ($idorganizador) {
            return $query->where('idorganizador', $idorganizador)
                  ->where('nombre', 'like', '%' . $this->search .'%');
        })->orWhere(function ($query) use ($idorganizador) {
            return $query->where('idorganizador', $idorganizador)
                  ->where('direccion', 'like', '%' . $this->search .'%');
        })->orWhere(function ($query) use ($idorganizador) {
            return $query->where('idorganizador', $idorganizador)
                  ->where('fecha', 'like', '%' . $this->search .'%');
        })->orWhere(function ($query) use ($idorganizador) {
            return $query->where('idorganizador', $idorganizador)
                  ->where('hora', 'like', '%' . $this->search .'%');
        })->orderBy('id', 'desc')->get();
        
        return view('livewire..organizador.mis-eventos.show-eventos', compact('eventos'));
    }
}

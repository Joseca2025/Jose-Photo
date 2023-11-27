<?php

namespace App\Http\Livewire\Usuarios\Catalogo;

use App\Models\evento;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $eventos = evento::where('nombre', 'like', '%' . $this->search . '%')->get();
        return view('livewire..usuarios.catalogo.index', compact('eventos'));
    }
}

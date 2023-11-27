<?php

namespace App\Http\Livewire\Fotografo\Catalogo;

use App\Models\evento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;


class ShowCatalogo extends Component
{
    use WithPagination;
    public $search;

    public $idfotografo;

    public function mount()
    {
        $this->idfotografo = DB::table('fotografos')->where('iduser', auth()->user()->id)->value('id');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $idfotografo = $this->idfotografo;


        // WHERE (a = 1 AND b =1 ) or (c = 1 AND d = 1)
        $eventos = evento::where('idfotografo', $idfotografo)
        ->where(function ($query) use ($idfotografo) {
            return $query->where('idfotografo', $idfotografo)
                ->where('nombre', 'like', '%' . $this->search . '%');
        })->orWhere(function ($query) use ($idfotografo) {
            return $query->where('idfotografo', $idfotografo)
                ->where('direccion', 'like', '%' . $this->search . '%');
        })->orWhere(function ($query) use ($idfotografo) {
            return $query->where('idfotografo', $idfotografo)
                ->where('fecha', 'like', '%' . $this->search . '%');
        })->orWhere(function ($query) use ($idfotografo) {
            return $query->where('idfotografo', $idfotografo)
                ->where('hora', 'like', '%' . $this->search . '%');
        })->orderBy('id', 'desc')->get();



        return view('livewire..fotografo.catalogo.show-catalogo', compact('eventos'));
    }
}

<?php

namespace App\Http\Livewire\Fotografo\Catalogo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class VistaFotosFiltro extends Component
{

    public $imagenes;
    public $idevento;

    protected $listeners = ["recargar"];

    public function recargar($idevento){
        $evento = DB::table('eventos')->where('id', $idevento)->first();
        $this->imagenes = DB::table('fotografias')->where('idcatalogo', $evento->idcatalogo)->get();
    }


    public function publicas(){
        $evento = DB::table('eventos')->where('id', $this->idevento)->first();
        $this->imagenes = DB::table('fotografias')->where('idcatalogo', $evento->idcatalogo)->where('tipo', "publica")->get();
    }

    public function privadas(){
        $evento = DB::table('eventos')->where('id', $this->idevento)->first();
        $this->imagenes = DB::table('fotografias')->where('idcatalogo', $evento->idcatalogo)->where('tipo', "privada")->get();
    }

    public function qr(){
        $evento = DB::table('eventos')->where('id', $this->idevento)->first();
        $this->imagenes = DB::table('fotografias')->where('idcatalogo', $evento->idcatalogo)->where('tipo', "qr")->get();
    }

    public function todas(){
        $evento = DB::table('eventos')->where('id', $this->idevento)->first();
        $this->imagenes = DB::table('fotografias')->where('idcatalogo', $evento->idcatalogo)->get();
    }


    public function mount($evento) {
        $this->idevento = $evento;
        $evento = DB::table('eventos')->where('id', $this->idevento)->first();
        $this->imagenes = DB::table('fotografias')->where('idcatalogo', $evento->idcatalogo)->get();
    }

    public function render()
    {
        return view('livewire..fotografo.catalogo.vista-fotos-filtro');
    }
}

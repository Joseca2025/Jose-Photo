<?php

namespace App\Http\Livewire\Organizador\MisEventos;

use App\Models\fotografo;
use App\Models\notificacion_contrato;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;

class TablaFotografos extends Component
{
    use WithPagination;
    public $search;
    public $evento;
    public $open = false;

    ///// modal
    public $fotografo_name;
    public $paquete_name;

    //para la notificacion
    public $idfotografo;
    public $idpaquete;



    public function mount($evento)
    {
        $this->evento = $evento;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function abrirModal($idfoto, $idpaque)
    {
        $datosfotografo = fotografo::join('users', 'fotografos.iduser', 'users.id')
            ->select(
                'users.id as iduser',
                'users.name as name',
                'fotografos.id as idfotografo',
            )->where('fotografos.id', $idfoto)->first();

        $datospaquete = DB::table('paquete_fotos')
            ->where('id', $idpaque)->first();

        $this->fotografo_name = $datosfotografo->name;
        $this->paquete_name = $datospaquete->nombre;

        $this->idfotografo = $idfoto;
        $this->idpaquete = $idpaque;
        $this->open = true;
   
    }

    public function EnviarNotificacion()
    {
        notificacion_contrato::create([
            'idfotografo' => $this->idfotografo,
            'idorganizador' => $this->evento->idorganizador,
            'idevento' => $this->evento->id,
            'idpaquete_foto' => $this->idpaquete,
            'estado' => 'espera'
        ]);

        //dd($this->idfotografo, $this->evento->idorganizador, $this->evento->id, $this->idpaquete,);
        event( new \App\Events\notificacion_contrato($this->idfotografo, $this->evento->idorganizador, 
        $this->evento->id, $this->idpaquete));
        $this->open = false;
    }

    public function render()
    {
        $fotografos = fotografo::join('users', 'fotografos.iduser', 'users.id')
            ->select(
                'users.id as iduser',
                'users.name as name',
                'users.email as email',
                'users.direccion as direccion',
                'users.telefono as telefono',
                'users.dni as dni',
                'users.fnacimiento as fnacimiento',
                'fotografos.id as idfotografo',
            )->where('users.name', 'like', '%' . $this->search . '%')
            ->orWhere('users.email', 'like', '%' . $this->search . '%')
            ->orWhere('users.direccion', 'like', '%' . $this->search . '%')
            ->orWhere('users.telefono', 'like', '%' . $this->search . '%')
            ->orWhere('users.dni', 'like', '%' . $this->search . '%')
            ->orWhere('users.fnacimiento', 'like', '%' . $this->search . '%')
            ->get();

        $evento = $this->evento;
        return view('livewire..organizador.mis-eventos.tabla-fotografos', compact('fotografos', 'evento'));
    }
}

<?php

namespace App\Http\Livewire\Fotografo\Perfil;

use App\Models\paquete_fotos;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TablaPaquetes extends Component
{
    public $open = false;
    public $paquete;

    protected $rules = [
        'paquete.nombre' => 'required',
        'paquete.descripcion' => 'required',
        'paquete.precio' => 'required|numeric'
    ];

    public function abrir($paquete)
    {
        $this->paquete = $paquete;
        $this->open = true;
    }

    public function guardar()
    {
        $this->validate();


        $mipaquete = paquete_fotos::find($this->paquete['idpaquete_fotos']);
        $mipaquete->nombre = $this->paquete['nombre'];
        $mipaquete->descripcion = $this->paquete['descripcion'];
        $mipaquete->precio = $this->paquete['precio'];
        $mipaquete->save();

        $this->reset(['open', 'paquete']);
        $this->open = false;
    }


    public function render()
    {
        // $bitacoras = Bitacora::where('id', 'LIKE' , '%' . $this->search . '%')->orwhere('ip','LIKE' , '%' . $this->search . '%')->orwhere('afectado','LIKE' , '%' . $this->search . '%')->orwhere('fecha_h','LIKE' , '%' . $this->search . '%')->orwhere('accion','LIKE' , '%' . $this->search . '%')->orwhere('apartado','LIKE' , '%' . $this->search . '%')->paginate(20);


        $paquetes = User::join('fotografos', 'users.id', 'fotografos.iduser')
            ->join('paquete_fotos', 'fotografos.id', 'paquete_fotos.idfotografo')
            ->select(
                'users.id as iduser',
                'fotografos.id as idfotografo',
                'paquete_fotos.id as idpaquete_fotos',
                'paquete_fotos.nombre as nombre',
                'paquete_fotos.descripcion as descripcion',
                'paquete_fotos.precio as precio'
            )
            ->where('users.id', auth()->user()->id)->get();

        return view('livewire..fotografo.perfil.tabla-paquetes', compact('paquetes'));
    }
}

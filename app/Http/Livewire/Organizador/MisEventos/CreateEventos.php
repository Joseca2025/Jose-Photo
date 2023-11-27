<?php

namespace App\Http\Livewire\Organizador\MisEventos;

use App\Models\evento;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateEventos extends Component
{

    public $open = false;

    public $nombre, $direccion, $fecha, $hora;

    //validaciones
    protected $rules = [
        'nombre' => ['required', 'string', 'max:255'],
        'direccion' => ['required', 'string', 'max:255'],
        'fecha' => ['required', 'date'],
        'hora' => 'required',
    ];

    public function save()
    {
        $this->validate(); 

        $idorganizador = DB::table('organizadors')->where('iduser', auth()->user()->id)->value('id');

        evento::create([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'idorganizador' => $idorganizador
        ]);

        //elimina los datos del input y cierra el modal
        $this->reset(['open', 'nombre', 'direccion', 'fecha', 'hora']);

        //creo un evento para que lo escuche ShowEventos
        $this->emit('render');
        $this->emit('alert', 'Evento registrado exitosamente');
    }
    
    public function render()
    {
        return view('livewire..organizador.mis-eventos.create-eventos');
    }
}

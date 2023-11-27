<?php

namespace App\Http\Livewire\Fotografo\Perfil;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CrearPerfil extends Component
{
    public $open = false;

    //usuario
    public $nombre, $email, $telefono, $dni, $direccion, $fnacimiento = "";

    //validaciones

    protected $rules = [
        'nombre' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'telefono' => ['required', 'string','min:7', 'max:12'],
        'dni' => ['required', 'string','min:5', 'max:12'],
        'direccion' => ['required', 'string', 'max:255'],
        'fnacimiento' => 'required',
    ];


    public function mount()
    {
        $usuario = DB::table('users')->where('id', auth()->user()->id)->first();
        $this->nombre = $usuario->name;
        $this->email = $usuario->email;
        $this->telefono = $usuario->telefono;
        $this->dni = $usuario->dni;
        $this->direccion = $usuario->direccion;
        $this->fnacimiento = $usuario->fnacimiento;
    }

    public function guardar()
    {
        $this->validate();

        $user = User::find(auth()->user()->id);
        $user->name = $this->nombre;
        if ($user->email != $this->email) {
            $user->email = $this->email;
        }
        $user->telefono = $this->telefono;
        $user->dni = $this->dni;
        $user->direccion = $this->direccion;
        $user->fnacimiento = $this->fnacimiento;
        $user->save();

        $this->open = false;
    }


    public function render()
    {
        return view('livewire..fotografo.perfil.crear-perfil');
    }
}

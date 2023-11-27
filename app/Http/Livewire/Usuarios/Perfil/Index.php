<?php

namespace App\Http\Livewire\Usuarios\Perfil;

use App\Models\foto_perfil;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;


class Index extends Component
{
    use WithFileUploads;
    public $nombre;
    public $email;
    public $telefono;
    public $dni;
    public $direccion;
    public $fnacimiento;
    public $photos = [];



    protected $rules = [
        'nombre' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'telefono' => ['required', 'string', 'min:7', 'max:12'],
        'dni' => ['required', 'string', 'min:5', 'max:12'],
        'direccion' => ['required', 'string', 'max:255'],
        'fnacimiento' => 'required',
        'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
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

        $usuario = DB::table('users')->where('id', auth()->user()->id)->first();
        $imagenes = foto_perfil::where('iduser', $usuario->id)->where('ruta', null)->get();


        foreach ($this->photos as $photo) {
            $ima1 = foto_perfil::where('iduser', $usuario->id)->where('posicion', 1)->first();
            if($ima1->ruta == null){
                $nombre = $ima1->posicion . '.' . $photo->getClientOriginalExtension();
                $ruta = $photo->storeAs('public/usuarios/' . $usuario->id , $nombre);
                $url = Storage::url($ruta);
                $ima1->ruta = $url;
                $ima1->save();
                continue;
            }

            $ima2 = foto_perfil::where('iduser', $usuario->id)->where('posicion', 2)->first();
            if($ima2->ruta == null){
                $nombre = $ima2->posicion . '.' . $photo->getClientOriginalExtension();
                $ruta = $photo->storeAs('public/usuarios/' . $usuario->id , $nombre);
                $url = Storage::url($ruta);
                $ima2->ruta = $url;
                $ima2->save();
                continue;

            }

            $ima3 = foto_perfil::where('iduser', $usuario->id)->where('posicion', 3)->first();
            if($ima3->ruta == null){
                $nombre = $ima3->posicion . '.' . $photo->getClientOriginalExtension();
                $ruta = $photo->storeAs('public/usuarios/' . $usuario->id , $nombre);
                $url = Storage::url($ruta);
                $ima3->ruta = $url;
                $ima3->save();
                continue;

            }
        }


        if(count($imagenes) == 0){
            $this->emit("error-foto");
        }else{
        $this->emit("datos-guardados");
        }

        $this->emit("recargar");
        $this->photos= [];

    }


    public function render()
    {
        return view('livewire..usuarios.perfil.index');
    }
}

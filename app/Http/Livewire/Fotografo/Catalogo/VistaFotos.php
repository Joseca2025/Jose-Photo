<?php

namespace App\Http\Livewire\Fotografo\Catalogo;

use App\Models\fotografia;
use App\Models\notificacion_faceapi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class VistaFotos extends Component
{
    use WithFileUploads;
    public $idevento;

    public $tipo;
    public $precio;
    public $photos = [];
    


    protected $rules = [
        'photos.*' => 'required|image',
        'tipo' => 'required',
        'precio' => 'required|numeric'
    ];

    protected $listeners = ["notiAparecesFoto"];


    public function mount($evento)
    {
        $this->idevento = $evento;
        $evento = DB::table('eventos')->where('id', $this->idevento)->first();

    }

    public function render()
    {
        $evento = DB::table('eventos')->where('id', $this->idevento)->first();
        //$this->imagenes = DB::table('fotografias')->where('idcatalogo', $evento->idcatalogo)->get();
        return view('livewire..fotografo.catalogo.vista-fotos', compact('evento'));
    }



    public function save()
    {

        $this->validate();
        $evento = DB::table('eventos')->where('id', $this->idevento)->first();

        foreach ($this->photos as $photo) {
            //obtengo el nombre
            //$nombre = time().'_'.$photo->getClientOriginalName();
            //ruta a guardar
            $ruta = $photo->store('public/eventos/' . $this->idevento);
            $url = Storage::url($ruta);
            //base de datos
            fotografia::create([
                'ruta' => $url,
                'idcatalogo' => $evento->idcatalogo,
                'tipo' => $this->tipo,
                'precio' => $this->precio
            ]);
        }

        $usuarios = [];
        $evento = $this->idevento;
        $directorios = Storage::Directories('public/usuarios');
        foreach ($directorios as $dir) {
            $carpeta = str_replace('public/usuarios/', '', $dir);
            array_push( $usuarios, $carpeta);
        }
        $this->emit('face-api', $usuarios, $evento );

        $this->photos = [];
        $this->emit("recargar", $this->idevento);
    }


    public function notiAparecesFoto($idusuarios, $idevento)
    {
        if($this->tipo == 'publica'){
            $resultado = [];
            foreach ($idusuarios as $usuario) {
                if($usuario != 'unknown'){
                    array_push( $resultado, (int)$usuario);
                    notificacion_faceapi::create([
                        'iduser' => (int)$usuario,
                        'idevento' => $idevento
                    ]);
                }
    
            }
            event( new \App\Events\aparecesFotoApi($idevento));    
        }
        $this->reset(['tipo', 'precio']);
    }
}

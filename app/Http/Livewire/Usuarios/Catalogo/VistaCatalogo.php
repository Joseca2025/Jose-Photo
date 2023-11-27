<?php

namespace App\Http\Livewire\Usuarios\Catalogo;

use App\Models\comprafoto;
use App\Models\fotografia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class VistaCatalogo extends Component
{

    public $idevento;
    public $marcadas = [];

    protected $listeners = ['vista_catalogo_comprar'];

    public function mount($idevento)
    {
        $this->idevento = $idevento;
        //dd($this->eventos);
    }

    public function preguntar()
    {
        $fotosmarcadas = $this->marcadas;
        $this->emit('seguro-de-comprar', $fotosmarcadas);
    }

    public function vista_catalogo_comprar($fotosmarcadas)
    {
        if (count($fotosmarcadas) > 0) {
            foreach ($fotosmarcadas as $key) {
                $existe = DB::table('comprafotos')->where('iduser', auth()->user()->id)->where('idfotografia', $key)->first();
                if ($existe == null) {
                    comprafoto::create([
                        'iduser' => auth()->user()->id,
                        'idfotografia' => $key,
                        'idevento' => $this->idevento 
                    ]);
                }
            }
        }
    
    }

    public function descargar($id)
    {
        $foto = fotografia::where('id', $id)->first();
        $url = str_replace('storage', 'public', $foto->ruta);
        return Storage::download($url);
    }

    public function render()
    {
        $evento = DB::table('eventos')->where('id', $this->idevento)->first();
        $fotografias = fotografia::where('idcatalogo', $evento->idcatalogo)->where('tipo', 'publica')->get();
        $compradas = DB::table('comprafotos')->where('iduser', auth()->user()->id)->get();

        return view('livewire..usuarios.catalogo.vista-catalogo', compact('fotografias', 'evento', 'compradas'));
    }
}

<?php

namespace App\Http\Controllers\Fotografo;

use App\Http\Controllers\Controller;
use App\Models\evento;
use App\Models\fotografia;
use App\Models\paquete as paque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class home extends Controller
{
    public function index()
    {
        if (count(auth()->user()->getRoleNames()) == 0) {
            $paquetes = paque::all();
            return view('dashboard', compact('paquetes'));
        }
        if (auth()->user()->getRoleNames()[0] == 'fotografo') {
            $usuario = auth()->user();
            return view('fotografo.home', compact('usuario'));
        }
    }

    public function catalogos()
    {
        if (count(auth()->user()->getRoleNames()) == 0) {
            $paquetes = paque::all();
            return view('dashboard', compact('paquetes'));
        }
        if (auth()->user()->getRoleNames()[0] == 'fotografo') {
            return view('fotografo.catalogos.index');
        }
    }

    public function vistaFotos($id)
    {
        if (count(auth()->user()->getRoleNames()) == 0) {
            $paquetes = paque::all();
            return view('dashboard', compact('paquetes'));
        }
        if (auth()->user()->getRoleNames()[0] == 'fotografo') {
            $evento = evento::where('id', $id)->first();
            return view('fotografo.catalogos.vista-fotos', compact('evento'));
        }
    }

    public function guardarImagenes($id)
    {
        if (count(auth()->user()->getRoleNames()) == 0) {
            $paquetes = paque::all();
            return view('dashboard', compact('paquetes'));
        }
        if (auth()->user()->getRoleNames()[0] == 'fotografo') {
            $evento = evento::where('id', $id)->first();
            return view('fotografo.catalogos.vista-fotos', compact('evento'));
        }
    }


    public function eliminarFotos(Request $request, $idevento)
    {
        $marcadas = $request->marcadas;
        foreach ($marcadas as $key) {
            $foto = fotografia::where('id', (int)$key)->first();
            $url = str_replace('storage', 'public', $foto->ruta);
            Storage::delete($url);
            $foto->delete();
        }

        return redirect()->route('Fotografo.vista-fotos', $idevento);
    }

    public function detallesVenta($id)
    {
        if (count(auth()->user()->getRoleNames()) == 0) {
            $paquetes = paque::all();
            return view('dashboard', compact('paquetes'));
        }
        if (auth()->user()->getRoleNames()[0] == 'fotografo') {
            $evento = evento::where('id', $id)->first();
            return view('fotografo.catalogos.detalle-venta', compact('evento'));
        }
    }

}

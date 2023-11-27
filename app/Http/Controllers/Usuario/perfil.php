<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\foto_perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class perfil extends Controller
{
    //
    public function perfil(){
        return view('usuario.perfil');
    }

    public function cambiarFoto(Request $request){
        $marcadas = $request->marcadas;
        foreach ($marcadas as $marcada) {
            $foto = foto_perfil::where('id', (int)$marcada)->first();
            $url = str_replace('storage', 'public', $foto->ruta);
            Storage::delete($url);
            $foto->ruta = null;
            $foto->save();
        }


        
        return redirect()->route('usuarios.perfil');
        
    }
}

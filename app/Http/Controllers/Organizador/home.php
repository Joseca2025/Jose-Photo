<?php

namespace App\Http\Controllers\Organizador;

use App\Http\Controllers\Controller;
use App\Models\fotografia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class home extends Controller
{
    public function index(){
        if(count(auth()->user()->getRoleNames()) == 0){
            $paquetes = paque::all();
            return view('dashboard', compact('paquetes'));
        }
        if (auth()->user()->getRoleNames()[0] == 'organizador') {
            $usuario = auth()->user();
            return view('organizador.home', compact('usuario'));
        }
    }

    // public function descargarFotos(Request $request, $idevento)
    // {
    //     $zip = new ZipArchive;
    //     $filename = 'fotos.zip';
    //     if($zip->open(public_path($filename), ZipArchive::CREATE === TRUE)){
    //         $marcadas = $request->marcadas;
    //         foreach ($marcadas as $key) {
    //             $foto = fotografia::where('id', (int)$key)->first();                
    //             $path = public_path();
    //             $url = str_replace('/storage', $path, $foto->ruta);
    //             dd($url);
    //             $relativeNameInZipFile = basename($foto->ruta);
    //             $zip->addFile($url, $relativeNameInZipFile);
    //         }
    //         $zip->close();
    //     }
    //     return response()->download(public_path($filename));
    //     //return redirect()->route('organizador.misEventos.catalogo', $idevento);
    // }
}

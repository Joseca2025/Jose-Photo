<?php

namespace App\Http\Controllers\Fotografo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\paquete as paque;


class misPaquetes extends Controller
{
    public function index(){
        if(count(auth()->user()->getRoleNames()) == 0){
            $paquetes = paque::all();
            return view('dashboard', compact('paquetes'));
        }
        if (auth()->user()->getRoleNames()[0] == 'fotografo') {
            return view('fotografo.paquetes.index');
        }

    }
}

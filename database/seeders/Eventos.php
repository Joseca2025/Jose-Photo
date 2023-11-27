<?php

namespace Database\Seeders;

use App\Models\evento;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Eventos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $date = Carbon::now();

        evento::create([
            'idorganizador' => 1,
            'nombre' => 'Fiesta Proyecto x',
            'direccion' => 'Urubo village',
            'fecha' => Carbon::parse('2023-11-29'),
            'hora' => $date->toTimeString()
        ]);



        evento::create([
            'idorganizador' => 1,
            'nombre' => 'Carrera Pedreste de santa cruz',
            'direccion' => 'La plaza 24 de septiembre',
            'fecha' => Carbon::parse('2023-11-30'),
            'hora' => $date->toTimeString()
        ]);

        evento::create([
            'idorganizador' => 2,
            'nombre' => 'Boda de Maria y Marcos',
            'direccion' => 'Los mangales calle 2 Nro 19',
            'fecha' => Carbon::parse('2022-10-01'),
            'hora' => $date->toTimeString()
        ]);

        evento::create([
            'idorganizador' => 2,
            'nombre' => 'Kermes solidaria por los bomberos',
            'direccion' => 'Urbanizacion cotoca',
            'fecha' => Carbon::parse('2023-12-05'),
            'hora' => $date->toTimeString()
        ]);

        evento::create([
            'idorganizador' => 3,
            'nombre' => 'Peloteada campeonado',
            'direccion' => 'Cuarto anillo virgen de cotoca',
            'fecha' => Carbon::parse('2023-12-11'),
            'hora' => $date->toTimeString()
        ]);

        evento::create([
            'idorganizador' => 3,
            'nombre' => 'Graduacion Carrera Sistemas',
            'direccion' => 'Hotel los tajibos 3er anillo externo',
            'fecha' => Carbon::parse('2022-10-01'),
            'hora' => $date->toTimeString()
        ]);

       

       

        
    }
}

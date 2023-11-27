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
            'nombre' => 'Fiesta en la Finca',
            'direccion' => 'Los Lotes calle 2 Nro 15',
            'fecha' => Carbon::parse('2022-10-01'),
            'hora' => $date->toTimeString()
        ]);



        evento::create([
            'idorganizador' => 1,
            'nombre' => 'Marathon Atlas',
            'direccion' => 'Los matales calle 2 Nro 20',
            'fecha' => Carbon::parse('2022-10-01'),
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
            'nombre' => 'Cumpleaños de Juana',
            'direccion' => 'Las Lomas calle 2 Nro 15',
            'fecha' => Carbon::parse('2022-10-01'),
            'hora' => $date->toTimeString()
        ]);

        evento::create([
            'idorganizador' => 3,
            'nombre' => 'Campeonato UAGRM',
            'direccion' => '2do anillo avenidad Bush',
            'fecha' => Carbon::parse('2022-10-01'),
            'hora' => $date->toTimeString()
        ]);

        evento::create([
            'idorganizador' => 3,
            'nombre' => 'Graduacion Carrera Sistemas',
            'direccion' => 'Hotel los tajibos 3er anillo externo',
            'fecha' => Carbon::parse('2022-10-01'),
            'hora' => $date->toTimeString()
        ]);

        evento::create([
            'idorganizador' => 4,
            'nombre' => 'Feria del Libro',
            'direccion' => 'Feria expocruz 3er anillo interno Av roca y coronado',
            'fecha' => Carbon::parse('2022-10-01'),
            'hora' => $date->toTimeString()
        ]);

        evento::create([
            'idorganizador' => 4,
            'nombre' => 'Graduacion Col Jose Malky',
            'direccion' => 'Av santos Dumont al lado del mercado ramafa',
            'fecha' => Carbon::parse('2022-10-01'),
            'hora' => $date->toTimeString()
        ]);

        evento::create([
            'idorganizador' => 5,
            'nombre' => 'Feria del Pescado',
            'direccion' => 'Mercado los bosques 5to anillo doble via a la guardia',
            'fecha' => Carbon::parse('2022-10-01'),
            'hora' => $date->toTimeString()
        ]);

        evento::create([
            'idorganizador' => 5,
            'nombre' => 'Cabildo',
            'direccion' => '2do anillo av banzar',
            'fecha' => Carbon::parse('2022-10-01'),
            'hora' => $date->toTimeString()
        ]);
    }
}

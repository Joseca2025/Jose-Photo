<?php

namespace Database\Seeders;

use App\Models\paquete_fotos;
use Illuminate\Database\Seeder;

class PaqueteFotos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        paquete_fotos::create([
            'nombre' => 'Bronce',
            'descripcion' => '-1000 fotos en HD 2  -2hr de video con 1 camara sin drone',
            'idfotografo' => 1,
            'precio' => 50,
            'posicion' => 1
        ]);

        paquete_fotos::create([
            'nombre' => 'Plata',
            'descripcion' => '-2000 fotos en solo HD - Media fiesta de grabacion con 3 camaras sin drone',
            'idfotografo' => 1,
            'precio' => 100,
            'posicion' => 2
        ]);

        paquete_fotos::create([
            'nombre' => 'Oro',
            'descripcion' => '-3000 fotos en FULL HD 4k con IA - Grabacion del evento completo en FULL HD 4K con drone',
            'idfotografo' => 1,
            'precio' => 175,
            'posicion' => 3
        ]);


        paquete_fotos::create([
            'nombre' => 'Master',
            'descripcion' => '-800  fotos en baja calidad - sin video',
            'idfotografo' => 2,
            'precio' => 50,
            'posicion' => 1
        ]);

        paquete_fotos::create([
            'nombre' => 'Jefe',
            'descripcion' => '-1000 fotos impresas en CD - Media fiesta de grabacion en HD',
            'idfotografo' => 2,
            'precio' => 100,
            'posicion' => 2
        ]);

        paquete_fotos::create([
            'nombre' => 'Señior',
            'descripcion' => '-2000 foto con flash incluido - Toda la fiesta con 4 camaras profecionales',
            'idfotografo' => 2,
            'precio' => 175,
            'posicion' => 3
        ]);

        paquete_fotos::create([
            'nombre' => 'Basico',
            'descripcion' => '-50 fotos -1hr de video',
            'idfotografo' => 3,
            'precio' => 50,
            'posicion' => 1
        ]);

        paquete_fotos::create([
            'nombre' => 'Vip',
            'descripcion' => '-100 fotos - 2hr de video',
            'idfotografo' => 3,
            'precio' => 100,
            'posicion' => 2
        ]);

        paquete_fotos::create([
            'nombre' => 'Premium',
            'descripcion' => '-300 fotos - 3hr de video',
            'idfotografo' => 3,
            'precio' => 175,
            'posicion' => 3
        ]);

        paquete_fotos::create([
            'nombre' => 'Bronce',
            'descripcion' => '-100 fotos en calidad baja -2hr de video en HD sin drone',
            'idfotografo' => 4,
            'precio' => 50,
            'posicion' => 1
        ]);

        paquete_fotos::create([
            'nombre' => 'Planta',
            'descripcion' => '-150 fotos solo HD - 4hr de video sin drone en HD',
            'idfotografo' => 4,
            'precio' => 100,
            'posicion' => 2
        ]);

        paquete_fotos::create([
            'nombre' => 'Oro',
            'descripcion' => '- 200 fotos FULL HD - video  de toda la boda lo que dure en HD 4k con drone',
            'idfotografo' => 4,
            'precio' => 175,
            'posicion' => 3
        ]);

        paquete_fotos::create([
            'nombre' => 'Bronce',
            'descripcion' => '-100 fotos en calidad baja -2hr de video en HD sin drone',
            'idfotografo' => 5,
            'precio' => 50,
            'posicion' => 1
        ]);

        paquete_fotos::create([
            'nombre' => 'Planta',
            'descripcion' => '-150 fotos solo HD - 4hr de video sin drone en HD ',
            'idfotografo' => 5,
            'precio' => 100,
            'posicion' => 2
        ]);

        paquete_fotos::create([
            'nombre' => 'Oro',
            'descripcion' => '- 200 fotos FULL HD - video  de toda la boda lo que dure en HD 4k con drone',
            'idfotografo' => 5,
            'precio' => 175,
            'posicion' => 3
        ]);
     
    }
}

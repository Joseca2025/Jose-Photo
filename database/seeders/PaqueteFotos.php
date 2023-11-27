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
            'nombre' => 'Basico',
            'descripcion' => '-50 fotos -1hr de video',
            'idfotografo' => 1,
            'precio' => 50,
            'posicion' => 1
        ]);

        paquete_fotos::create([
            'nombre' => 'Vip',
            'descripcion' => '-100 fotos - 2hr de video',
            'idfotografo' => 1,
            'precio' => 100,
            'posicion' => 2
        ]);

        paquete_fotos::create([
            'nombre' => 'Premium',
            'descripcion' => '-300 fotos - 3hr de video',
            'idfotografo' => 1,
            'precio' => 175,
            'posicion' => 3
        ]);


        paquete_fotos::create([
            'nombre' => 'Basico',
            'descripcion' => '-50 fotos -1hr de video',
            'idfotografo' => 2,
            'precio' => 50,
            'posicion' => 1
        ]);

        paquete_fotos::create([
            'nombre' => 'Vip',
            'descripcion' => '-100 fotos - 2hr de video',
            'idfotografo' => 2,
            'precio' => 100,
            'posicion' => 2
        ]);

        paquete_fotos::create([
            'nombre' => 'Premium',
            'descripcion' => '-300 fotos - 3hr de video',
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
            'nombre' => 'Basico',
            'descripcion' => '-50 fotos -1hr de video',
            'idfotografo' => 4,
            'precio' => 50,
            'posicion' => 1
        ]);

        paquete_fotos::create([
            'nombre' => 'Vip',
            'descripcion' => '-100 fotos - 2hr de video',
            'idfotografo' => 4,
            'precio' => 100,
            'posicion' => 2
        ]);

        paquete_fotos::create([
            'nombre' => 'Premium',
            'descripcion' => '-300 fotos - 3hr de video',
            'idfotografo' => 4,
            'precio' => 175,
            'posicion' => 3
        ]);

        paquete_fotos::create([
            'nombre' => 'Basico',
            'descripcion' => '-50 fotos -1hr de video',
            'idfotografo' => 5,
            'precio' => 50,
            'posicion' => 1
        ]);

        paquete_fotos::create([
            'nombre' => 'Vip',
            'descripcion' => '-100 fotos - 2hr de video',
            'idfotografo' => 5,
            'precio' => 100,
            'posicion' => 2
        ]);

        paquete_fotos::create([
            'nombre' => 'Premium',
            'descripcion' => '-300 fotos - 3hr de video',
            'idfotografo' => 5,
            'precio' => 175,
            'posicion' => 3
        ]);
     
    }
}

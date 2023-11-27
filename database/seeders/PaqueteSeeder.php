<?php

namespace Database\Seeders;

use App\Models\evento;
use Illuminate\Database\Seeder;
use App\Models\paquete;


class PaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paquete::create([
            'nombre' => 'cliente',
            'descripcion' => '
            - Buscar fotos.
            - Subir fotos.
            - Ver catalogo de fotos.
            - Notificacion en las fotos que apareces.',
            'precio' => 0
        ]);

        Paquete::create([
            'nombre' => 'fotografo',
            'descripcion' => '
            - Ser contratado para un evento.
            - Subir fotos.
            - Categorizar fotos.
            - Vender fotos.',
            'precio' => 5
        ]);

        Paquete::create([
            'nombre' => 'organizador',
            'descripcion' => '
            - Crear un evento.
            - Contratar fotografo.
            - QR de un catalogo.
            - Ver fotos.',
            'precio' => 6
        ]);
    }
}

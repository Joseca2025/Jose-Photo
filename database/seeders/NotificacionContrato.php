<?php

namespace Database\Seeders;

use App\Models\notificacion_contrato;
use Illuminate\Database\Seeder;

class NotificacionContrato extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        notificacion_contrato::create([
            'estado' => 'espera',
            'idorganizador' => 1,
            'idfotografo' => 1,
            'idevento' => 1,
            'idpaquete_foto' => 1
        ]);

        notificacion_contrato::create([
            'estado' => 'espera',
            'idorganizador' => 2,
            'idfotografo' => 1,
            'idevento' => 3,
            'idpaquete_foto' => 2
        ]);

        notificacion_contrato::create([
            'estado' => 'espera',
            'idorganizador' => 3,
            'idfotografo' => 2,
            'idevento' => 5,
            'idpaquete_foto' => 3
        ]);

        notificacion_contrato::create([
            'estado' => 'espera',
            'idorganizador' => 4,
            'idfotografo' => 3,
            'idevento' => 8,
            'idpaquete_foto' => 1
        ]);

        notificacion_contrato::create([
            'estado' => 'espera',
            'idorganizador' => 5,
            'idfotografo' => 4,
            'idevento' => 9,
            'idpaquete_foto' => 2
        ]);

        notificacion_contrato::create([
            'estado' => 'espera',
            'idorganizador' => 1,
            'idfotografo' => 5,
            'idevento' => 2,
            'idpaquete_foto' => 3
        ]);
    }
}

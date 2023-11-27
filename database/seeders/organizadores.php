<?php

namespace Database\Seeders;

use App\Models\organizador;
use App\Models\tarjeta_credito;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class organizadores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Belynes Siles',
            'email' => 'orga1@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 3,
            'telefono' => '18416500',
            'dni' => '5003400',
            'direccion' => 'Av Bush Nro 10',
            'fnacimiento' => Carbon::parse('1999-02-18')
        ])->assignRole('organizador');

        organizador::create([
            'iduser' => 11
        ]);


        tarjeta_credito::create([
            'numero' => '1111111111111121',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 11
        ]);

        User::create([
            'name' => 'Mario Lozano',
            'email' => 'orga2@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 3,
            'telefono' => '18416511',
            'dni' => '5003411',
            'direccion' => 'Av Bush Nro 956',
            'fnacimiento' => Carbon::parse('1997-08-12')
        ])->assignRole('organizador');

        organizador::create([
            'iduser' => 12
        ]);


        tarjeta_credito::create([
            'numero' => '1111111111111122',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 12
        ]);

        User::create([
            'name' => 'Micaela Roca',
            'email' => 'orga3@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 3,
            'telefono' => '18416522',
            'dni' => '5003422',
            'direccion' => 'Av Bolivia calle 10',
            'fnacimiento' => Carbon::parse('1987-09-29')
        ])->assignRole('organizador');

        organizador::create([
            'iduser' => 13
        ]);


        tarjeta_credito::create([
            'numero' => '1111111111111123',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 13
        ]);


        User::create([
            'name' => 'Miriam Quispe',
            'email' => 'orga4@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 3,
            'telefono' => '18416533',
            'dni' => '5003433',
            'direccion' => 'Av Bush calle 9',
            'fnacimiento' => Carbon::parse('1978-02-20')
        ])->assignRole('organizador');

        organizador::create([
            'iduser' => 14
        ]);


        tarjeta_credito::create([
            'numero' => '1111111111111124',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 14
        ]);

        User::create([
            'name' => 'Bianca Romero',
            'email' => 'orga5@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 3,
            'telefono' => '18416544',
            'dni' => '5003444',
            'direccion' => 'Av Alemana calle 1',
            'fnacimiento' => Carbon::parse('1969-08-18')
        ])->assignRole('organizador');

        organizador::create([
            'iduser' => 15
        ]);


        tarjeta_credito::create([
            'numero' => '1111111111111125',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 15
        ]);
    }
}

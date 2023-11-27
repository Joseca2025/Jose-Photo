<?php

namespace Database\Seeders;

use App\Models\fotografo;
use App\Models\tarjeta_credito;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class fotografos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        User::create([
            'name' => 'Mariano Alarcon',
            'email' => 'mariano@gmail.com',
            'password' => bcrypt('22222222'),
            'idpaquete' => 2,
            'telefono' => '6800000',
            'dni' => '2965743',
            'direccion' => 'Canal cotoca',
            'fnacimiento' => Carbon::parse('2002-10-02')
        ])->assignRole('fotografo');

        fotografo::create([
            'iduser' => 16
        ]);

        tarjeta_credito::create([
            'numero' => '1111111111111131',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 16
        ]);


        User::create([
            'name' => 'Claudi Melgar',
            'email' => 'claudia@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 2,
            'telefono' => '68697454',
            'dni' => '2003405',
            'direccion' => 'Plan tres mill',
            'fnacimiento' => Carbon::parse('1956-01-5')
        ])->assignRole('fotografo');

        fotografo::create([
            'iduser' => 17
        ]);

        tarjeta_credito::create([
            'numero' => '1111111111111132',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 17
        ]);


        User::create([
            'name' => 'Hugo Del Pozo',
            'email' => 'hugo@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 2,
            'telefono' => '68416506',
            'dni' => '2003406',
            'direccion' => 'Roca coronado',
            'fnacimiento' => Carbon::parse('1900-02-18')
        ])->assignRole('fotografo');

        fotografo::create([
            'iduser' => 18
        ]);

        tarjeta_credito::create([
            'numero' => '1111111111111133',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 18
        ]);

        User::create([
            'name' => 'Leonel Messi',
            'email' => 'leo@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 2,
            'telefono' => '61010101',
            'dni' => '2003407',
            'direccion' => 'Av Los Mangales Nro 89',
            'fnacimiento' => Carbon::parse('1910-10-10')
        ])->assignRole('fotografo');

        fotografo::create([
            'iduser' => 19
        ]);

        tarjeta_credito::create([
            'numero' => '1111111111111134',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 19
        ]);

        User::create([
            'name' => 'Marcelo Martins',
            'email' => 'marcelo@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 2,
            'telefono' => '66898288',
            'dni' => '2003408',
            'direccion' => 'Mundial de qatar',
            'fnacimiento' => Carbon::parse('1975-06-27')
        ])->assignRole('fotografo');

        fotografo::create([
            'iduser' => 20
        ]);

        tarjeta_credito::create([
            'numero' => '1111111111111135',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 20
        ]);
    }
}

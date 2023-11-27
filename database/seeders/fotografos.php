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
            'name' => 'Fabiola Navia',
            'email' => 'foto1@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 2,
            'telefono' => '68416504',
            'dni' => '2003404',
            'direccion' => 'Av Bush Nro 3019',
            'fnacimiento' => Carbon::parse('1980-02-18')
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
            'name' => 'Marina Campos',
            'email' => 'foto2@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 2,
            'telefono' => '68416505',
            'dni' => '2003405',
            'direccion' => 'Av Bush Nro 3099',
            'fnacimiento' => Carbon::parse('1985-02-18')
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
            'name' => 'Julieta Arancibia',
            'email' => 'foto3@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 2,
            'telefono' => '68416506',
            'dni' => '2003406',
            'direccion' => 'Av Bush Nro 2081',
            'fnacimiento' => Carbon::parse('1988-02-18')
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
            'name' => 'Jose Aguirre',
            'email' => 'foto4@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 2,
            'telefono' => '68416507',
            'dni' => '2003407',
            'direccion' => 'Av Los Mangales Nro 89',
            'fnacimiento' => Carbon::parse('1991-08-28')
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
            'name' => 'Teresa Siles',
            'email' => 'foto5@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 2,
            'telefono' => '68416508',
            'dni' => '2003408',
            'direccion' => 'Av Irala Nro 1019',
            'fnacimiento' => Carbon::parse('1980-03-20')
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

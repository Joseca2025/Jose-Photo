<?php

namespace Database\Seeders;

use App\Models\cliente;
use App\Models\tarjeta_credito;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class clientes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //id user 1
        User::create([
            'name' => 'Administador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('administrador');

        // id usuario del 2 al 10

        //////// 2 ///////////
        User::create([
            'name' => 'Jose Carlos Alarcon',
            'email' => 'jose@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 1,
            'telefono' => '69027621',
            'dni' => '9622096',
            'direccion' => 'Urbanizacion Palma verde',
            'fnacimiento' => Carbon::parse('2001-04-20')
        ])->assignRole('cliente');

        cliente::create([
            'iduser' => 2
        ]);

        tarjeta_credito::create([
            'numero' => '1111111111111111',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 2
        ]);

        //////// 3 ///////////
        User::create([
            'name' => 'Maria Jose Romero',
            'email' => 'maria@gmail.com',
            'password' => bcrypt('00000000'),
            'idpaquete' => 1,
            'telefono' => '78585929',
            'dni' => '9578467',
            'direccion' => 'Urbanizacion el mundo',
            'fnacimiento' => Carbon::parse('2000-01-25')
        ])->assignRole('cliente');

        cliente::create([
            'iduser' => 3
        ]);

        tarjeta_credito::create([
            'numero' => '1111111111111112',
            'fecha' => '12/32',
            'cvc' => '122',
            'iduser' => 3
        ]);

        //////////// 4 ///////////////

        User::create([
            'name' => 'Sergio Ortiz',
            'email' => 'sergio@gmail.com',
            'password' => bcrypt('11111111'),
            'idpaquete' => 1,
            'telefono' => '78000005',
            'dni' => '3269743',
            'direccion' => 'Condiminio bella vista',
            'fnacimiento' => Carbon::parse('2000-08-06')
        ])->assignRole('cliente');

        cliente::create([
            'iduser' => 4
        ]);


        tarjeta_credito::create([
            'numero' => '1111111111111113',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 4
        ]);

        /////////// 5 ////////////////

        User::create([
            'name' => 'Fernando Moreno',
            'email' => 'fernando@gmail.com',
            'password' => bcrypt('55555555'),
            'idpaquete' => 1,
            'telefono' => '79999999',
            'dni' => '3697444',
            'direccion' => 'Colinas del Urubo',
            'fnacimiento' => Carbon::parse('2002-09-24')
        ])->assignRole('cliente');

        cliente::create([
            'iduser' => 5
        ]);


        tarjeta_credito::create([
            'numero' => '1111111111111114',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 5
        ]);

        ///////////// 6 //////////////

        User::create([
            'name' => 'Julio Perez',
            'email' => 'cli5@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 1,
            'telefono' => '78416504',
            'dni' => '3203404',
            'direccion' => 'Avenida Santos Dumont Nro 719',
            'fnacimiento' => Carbon::parse('1980-10-01')
        ])->assignRole('cliente');

        cliente::create([
            'iduser' => 6
        ]);


        tarjeta_credito::create([
            'numero' => '1111111111111115',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 6
        ]);

        //////////// 7 ///////////////

        User::create([
            'name' => 'Enzo Pino',
            'email' => 'cli6@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 1,
            'telefono' => '78416505',
            'dni' => '3203405',
            'direccion' => 'Avenida Santos Dumont Nro 799',
            'fnacimiento' => Carbon::parse('1985-10-01')
        ])->assignRole('cliente');

        cliente::create([
            'iduser' => 7
        ]);


        tarjeta_credito::create([
            'numero' => '1111111111111116',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 7
        ]);

        ///////////// 8 //////////////

        User::create([
            'name' => 'Marcos Peralta',
            'email' => 'cli7@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 1,
            'telefono' => '78416506',
            'dni' => '3203406',
            'direccion' => 'Avenida Santos Dumont Nro 319',
            'fnacimiento' => Carbon::parse('1982-10-11')
        ])->assignRole('cliente');

        cliente::create([
            'iduser' => 8
        ]);


        tarjeta_credito::create([
            'numero' => '1111111111111117',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 8
        ]);

        ///////////// 9 //////////////

        User::create([
            'name' => 'Monica Velasquez',
            'email' => 'cli8@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 1,
            'telefono' => '78416507',
            'dni' => '3203407',
            'direccion' => 'Avenida Santos Dumont Nro 289',
            'fnacimiento' => Carbon::parse('1989-05-09')
        ])->assignRole('cliente');

        cliente::create([
            'iduser' => 9
        ]);


        tarjeta_credito::create([
            'numero' => '1111111111111118',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 9
        ]);

        ///////////// 10 //////////////

        User::create([
            'name' => 'Mateo Menacho',
            'email' => 'cli9@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 1,
            'telefono' => '78416508',
            'dni' => '3203408',
            'direccion' => 'Avenida Santos Dumont Nro 9',
            'fnacimiento' => Carbon::parse('2000-10-01')
        ])->assignRole('cliente');

        cliente::create([
            'iduser' => 10
        ]);


        tarjeta_credito::create([
            'numero' => '1111111111111119',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 10
        ]);

    }
}

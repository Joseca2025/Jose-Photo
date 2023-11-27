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
            'name' => 'Pedro Gonzales',
            'email' => 'orga1@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 3,
            'telefono' => '79317597',
            'dni' => '8945201',
            'direccion' => 'Condominio espiritu santo',
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
            'name' => 'Trinidad Socorro Duran',
            'email' => 'orga2@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 3,
            'telefono' => '785412',
            'dni' => '5003411',
            'direccion' => 'Barrio Polanco',
            'fnacimiento' => Carbon::parse('1896-10-10')
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
            'name' => 'Carlos Guillermo ALarcon',
            'email' => 'orga3@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 3,
            'telefono' => '78562147',
            'dni' => '1010101',
            'direccion' => 'Barrio polanco calle A',
            'fnacimiento' => Carbon::parse('1980-05-15')
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
            'name' => 'Mihaly Balazs',
            'email' => 'orga4@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 3,
            'telefono' => '75943012',
            'dni' => '9540367',
            'direccion' => 'Condominio villa burguese',
            'fnacimiento' => Carbon::parse('2001-04-11')
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
            'name' => 'Rodolfo menacho',
            'email' => 'orga5@gmail.com',
            'password' => bcrypt('12345678'),
            'idpaquete' => 3,
            'telefono' => '78195038',
            'dni' => '9999999',
            'direccion' => 'Condiminio Tarope',
            'fnacimiento' => Carbon::parse('2001-04-12')
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

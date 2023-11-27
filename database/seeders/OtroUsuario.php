<?php

namespace Database\Seeders;

use App\Models\tarjeta_credito;
use App\Models\User;
use Illuminate\Database\Seeder;

class OtroUsuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        // con tarjeta
        User::create([
            'name' => 'Valeria Bohorquez',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        tarjeta_credito::create([
            'numero' => '1111111111111141',
            'fecha' => '12/32',
            'cvc' => '123',
            'iduser' => 6
        ]);


        // Sin tarjeta
        User::create([
            'name' => 'Lucas Arnez',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('12345678')
        ]);


    }
}

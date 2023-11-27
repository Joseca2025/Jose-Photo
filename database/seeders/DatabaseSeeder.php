<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PaqueteSeeder::class);
        $this->call(clientes::class);
        $this->call(FotoPerfil::class);
        $this->call(organizadores::class);
        $this->call(Eventos::class);
        $this->call(fotografos::class);
        $this->call(PaqueteFotos::class);
        $this->call(NotificacionContrato::class);
        $this->call(OtroUsuario::class);



        // \App\Models\User::factory(10)->create();
    }
}

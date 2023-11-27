<?php

namespace Database\Seeders;

use App\Models\cliente;
use App\Models\foto_perfil;
use App\Models\fotografo;
use App\Models\notificacion_contrato;
use App\Models\organizador;
use App\Models\paquete_fotos;
use App\Models\tarjeta_credito;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $role1 = Role::create(['name' => 'administrador']);
        $role2 = Role::create(['name' => 'cliente']);
        $role3 = Role::create(['name' => 'organizador']);
        $role4 = Role::create(['name' => 'fotografo']);

        //asignar permisos a un ROLES
        Permission::create(['name' => 'administrador.home'])->syncRoles([$role1]);

        Permission::create(['name' => 'fotografo.ver-paquetes-fotos'])->syncRoles([$role4]);
        Permission::create(['name' => 'fotografo.notificaciones'])->syncRoles([$role4]);
        Permission::create(['name' => 'fotografo.catalogos'])->syncRoles([$role4]);




        Permission::create(['name' => 'organizador.eventos'])->syncRoles([$role3]);


    }
}

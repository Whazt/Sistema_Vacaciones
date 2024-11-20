<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Jefe']);   
        $role3 = Role::create(['name' => 'Empleado']);
        $role4 = Role::create(['name' => 'RH']);

        Permission::create(['name' => 'vacaciones'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'ver-solicitudes'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'ver-mis-solicitudes'])->syncRoles([$role2, $role3, $role4]);
        Permission::create(['name' => 'crear-solicitudes'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=> 'editar-solicitudes'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name'=> 'borrar-solicitudes'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'ver-Empleados'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'crear-Empleados'])->syncRoles([$role1, $role4]);
        Permission::create(['name'=> 'editar-Empleados'])->syncRoles([$role1, $role4]);
        Permission::create(['name'=> 'borrar-Empleados'])->syncRoles([$role1, $role4]);

        Permission::create(['name' => 'ver-Cargos'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'crear-Cargos'])->syncRoles([$role1, $role4]);
        Permission::create(['name'=> 'editar-Cargos'])->syncRoles([$role1, $role4]);
        Permission::create(['name'=> 'borrar-Cargos'])->syncRoles([$role1, $role4]);

        Permission::create(['name' => 'ver-Areas'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'crear-Areas'])->syncRoles([$role1, $role4]);
        Permission::create(['name'=> 'editar-Areas'])->syncRoles([$role1, $role4]);
        Permission::create(['name'=> 'borrar-Areas'])->syncRoles([$role1, $role4]); 

        Permission::create(['name' => 'ver-Usuarios'])->assignRole([$role1, $role4]);
        Permission::create(['name' => 'crear-Usuarios'])->assignRole([$role1, $role4]);
        Permission::create(['name'=> 'editar-Usuarios'])->assignRole([$role1, $role4]);
        Permission::create(['name'=> 'borrar-Usuarios'])->assignRole([$role1, $role4]);    
        

    }
}

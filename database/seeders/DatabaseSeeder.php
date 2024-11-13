<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Cargo;
use App\Models\Empleado;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $area = new Area([
            'nombre' => 'Mercadeo',
            'descripcion'=> 'Area de encargados de la mercadotecnia'    
        ]);
        $area->save();

        $area = new Area([
            'nombre' => 'Ventas',
            'descripcion'=> 'Area de encargados de las Ventas'    
        ]);
        $area->save();
        
        $cargo = new Cargo([
            'id_area' => 1,
            'nombre' => 'Encargado de Mercadeo',
            'descripcion'=> 'Jefe del area de ventas'    
        ]);
        $cargo->save();
        $cargo = new Cargo([
            'id_area' => 1,
            'nombre' => 'editor de fotos',
            'descripcion'=> 'Encargado de edicion de fotos'    
        ]);
        $cargo->save();

        $cargo = new Cargo([
            'id_area' => 2,
            'nombre' => 'Encargado de Ventas',
            'descripcion'=> 'Jefe del area de Ventas'    
        ]);
        $cargo->save();

        $cargo = new Cargo([
            'id_area' => 2,
            'nombre' => 'operador de salidas',
            'descripcion'=> 'encargado de salidas'    
        ]);
        $cargo->save();

        $empleado = new Empleado([
            'nombres' => 'Juan',
            'apellidos' => 'Perez',
            'correo' => 'juanperez@gmail.com',
            'id_cargo' => 1,
            'fecha_ingreso' => '2024-11-11',
            'dias_vacaciones_usados' => 0,
            'telefono' => '123456789',
  
            'estado' => 'activo',
            
            
        ]);
        $empleado->save();

        $empleado = new Empleado([
            'nombres' => 'Juana',
            'apellidos' => 'Pereza',
            'correo' => 'juanapereza@gmail.com',
            'id_cargo' => 2,
            'fecha_ingreso' => '2024-11-11',
            'dias_vacaciones_usados' => 0,
            'telefono' => '123456789',
            'id_jefe' => 1,
            'estado' => 'activo',

            
        ]);
        $empleado->save();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Cargo;
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
    }
}

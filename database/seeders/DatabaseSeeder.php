<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Cargo;
use App\Models\Empleado;
use App\Models\Solicitud;
use Carbon\Carbon; 

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
        User::Create([
            'name' => 'Juan Perez',
            'email' => 'juanperez@gmail.com',
            'password' => bcrypt('Admin123') // password
            
        ])->assignRole('admin');
        User::factory(10)->create();
 
        $this->call(RoleSeeder::class);

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
            'nombres' => 'Juan José',
            'apellidos' => 'Arce de la Cruz',
            'correo' => 'juanperez@gmail.com',
            'id_cargo' => 1,
            'fecha_ingreso' => '2024-11-11',
            'dias_vacaciones_usados' => 0,
            'telefono' => '123456789',
  
            'estado' => 'activo',
            
            
        ]);
        $empleado->save();

        $empleado = new Empleado([
            'nombres' => 'Juliana Matilde',
            'apellidos' => 'Argüello Peralta',
            'correo' => 'juliarg@gmail.com',
            'id_cargo' => 2,
            'fecha_ingreso' => '2024-11-11',
            'dias_vacaciones_usados' => 0,
            'telefono' => '123456789',
            'id_jefe' => 1,
            'estado' => 'activo',

            
        ]);
        $empleado->save();

           // Creación de 5 registros para la tabla 'solicitudes'
           $empleados = [1, 2]; // Id de empleados disponibles

           for ($i = 0; $i < 20 ; $i++) {
               $solicitud = new Solicitud([
                   'id_empleado' => $empleados[array_rand($empleados)], // Elige aleatoriamente entre los empleados 1 y 2
                   'fecha_inicio' => Carbon::now()->addDays($i)->toDateString(), // Fecha de inicio en los próximos días
                   'fecha_fin' => Carbon::now()->addDays($i + 1)->toDateString(), // Fecha de fin al siguiente día
                   'estado' => 'pendiente', // Estado por defecto
                   'detalles' => 'Solicitud de prueba ' . ($i + 1), // Detalles de la solicitud
                   'aprobacion_jefe' => null, // Sin aprobación del jefe
                   'aprobacion_rh' => null, // Sin aprobación de RH
               ]);
               $solicitud->save(); // Guarda el registro en la base de datos
            }
    }
}

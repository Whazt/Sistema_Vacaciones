<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Cargo;
use App\Models\Empleado;
use App\Models\Solicitud;
use App\Models\User;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        User::Create([
            'name' => 'Juan Perez',
            'email' => 'juanperez@gmail.com',
            'password' => bcrypt('Admin123') // password
            
        ])->assignRole('Admin');



        // $users = User::factory(10)->create();
 
        // $users->each(function ($user) {
        //     $user->assignRole('Empleado');
        // });

        Area::factory(5)->create(); 

        // $area = new Area([
        //     'nombre' => 'Mercadeo',
        //     'descripcion'=> 'Area de encargados de la mercadotecnia'    
        // ]);
        // $area->save();

        // $area = new Area([
        //     'nombre' => 'Ventas',
        //     'descripcion'=> 'Area de encargados de las Ventas'    
        // ]);
        // $area->save();

        Cargo::factory(15)->create();
        
        // $cargo = new Cargo([
        //     'id_area' => 1,
        //     'nombre' => 'Encargado de Mercadeo',
        //     'descripcion'=> 'Jefe del area de ventas'    
        // ]);
        // $cargo->save();
        // $cargo = new Cargo([
        //     'id_area' => 1,
        //     'nombre' => 'editor de fotos',
        //     'descripcion'=> 'Encargado de edicion de fotos'    
        // ]);
        // $cargo->save();

        // $cargo = new Cargo([
        //     'id_area' => 2,
        //     'nombre' => 'Encargado de Ventas',
        //     'descripcion'=> 'Jefe del area de Ventas'    
        // ]);
        // $cargo->save();

        // $cargo = new Cargo([
        //     'id_area' => 2,
        //     'nombre' => 'operador de salidas',
        //     'descripcion'=> 'encargado de salidas'    
        // ]);
        // $cargo->save();

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


   
        for ($i = 0; $i < 15; $i++) {
            // Datos aleatorios para el empleado
            $faker = \Faker\Factory::create();

            $nombres = $faker->firstName . ' ' . $faker->firstName;
            $apellidos = $faker->lastName . ' ' . $faker->lastName;
            $correo = $faker->unique()->safeEmail;
            $telefono = $faker->phoneNumber;

            // Crear el empleado
            $empleado = new Empleado([
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'correo' => $correo,
                'id_cargo' => null, // Dejar vacío
                'fecha_ingreso' => $faker->date(),
                'dias_vacaciones_usados' => 0,
                'telefono' => $telefono,
                'id_jefe' => null, // Dejar vacío
                'estado' => 'activo',
            ]);
            $empleado->save();

            // Crear el usuario asociado
            $user = new User([
                'name' => "$nombres $apellidos",
                'email' => $correo,
                'password' => Hash::make('#Password123'),
            ]);
            $user->save();
            $user->assignRole('Empleado');
        }

           // Creación de 5 registros para la tabla 'solicitudes'
            // Id de empleados disponibles

           for ($i = 0; $i < 20 ; $i++) {
               $solicitud = new Solicitud([
                   'id_empleado' =>  $faker->numberBetween(2,16), // Elige aleatoriamente entre los empleados 1 y 2
                   'fecha_inicio' => Carbon::now()->addDays($i)->toDateString(), // Fecha de inicio en los próximos días
                   'fecha_fin' => Carbon::now()->addDays($i + 1)->toDateString(), // Fecha de fin al siguiente día
                   'estado' => 'Pendiente', // Estado por defecto
                   'detalles' => 'Solicitud de prueba ' . ($i + 1), // Detalles de la solicitud
                   'aprobacion_jefe' => null, // Sin aprobación del jefe
                   'aprobacion_rh' => null, // Sin aprobación de RH
               ]);
               $solicitud->save(); // Guarda el registro en la base de datos
            }
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\VacacionesController;
use App\Http\Controllers\UsuarioController;
use App\Models\Area;
use App\Models\Cargo;

Route::get('/', function () {
    return view('paginas.vacaciones');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('/', function () {
        return view('paginas.vacaciones');
    })->name('home');


    Route::get('/areas', [AreaController::class, 'index'])->middleware('can:ver-Areas')
    ->name('paginas.areas');

    //Ruta de Cargos
    Route::get('/cargos', [CargoController::class, 'index'])->middleware('can:ver-Cargos')
        ->name('paginas.cargos');

    //Ruta de Emplead
    Route::get('/empleados', [EmpleadoController::class, 'index'])->middleware('can:ver-Empleados')
        ->name('paginas.empleados');

    //Ruta de Vacaciones
    Route::get('/vacaciones', [VacacionesController::class, 'index'])->middleware('can:vacaciones')
        ->name('paginas.vacaciones');

    //Ruta de Solicitudes
    Route::get('/solicitudes', [SolicitudController::class, 'index'])->middleware('can:ver-solicitudes')
        ->name('paginas.solicitudes');

    Route::get('/misSolicitudes', [SolicitudController::class, 'MisSolicitudes'])->middleware('can:ver-mis-solicitudes')
        ->name('paginas.misSolicitudes');
    
    Route::get('/usuarios', [UsuarioController::class, 'index'])->middleware('can:ver-Usuarios')
        ->name('paginas.usuarios');

});



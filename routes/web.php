<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\VacacionesController;
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
        return view('paginas.areas');
    })->name('home');

    Route::get('/areas', [AreaController::class, 'index'])
    ->name('paginas.areas');

    //Ruta de Cargos
    Route::get('/cargos', [CargoController::class, 'index'])
        ->name('paginas.cargos');

    //Ruta de Emplead
    Route::get('/empleados', [EmpleadoController::class, 'index'])
        ->name('paginas.empleados');

    //Ruta de Vacaciones
    Route::get('/vacaciones', [VacacionesController::class, 'index'])
        ->name('paginas.vacaciones');

    //Ruta de Solicitudes
    Route::get('/solicitudes', [SolicitudController::class, 'index'])
        ->name('paginas.solicitudes');

});



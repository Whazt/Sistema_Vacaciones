<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CargoController;
use App\Models\Area;
use App\Models\Cargo;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
});

//Ruta de Areas
Route::get('/areas', [AreaController::class, 'index'])
    ->name('areas.index');

//Ruta de Cargos
Route::get('/cargos', [CargoController::class, 'index'])
    ->name('cargos.index');

//Ruta de Empleados
Route::get('/empleados', [CargoController::class, 'index'])
    ->name('empleados.index');

//Ruta de Vacaciones
Route::get('/vacaciones', [CargoController::class, 'index'])
    ->name('vacaciones.index');

//Ruta de Solicitudes
Route::get('/solicitudes', [CargoController::class, 'index'])
    ->name('solicitudes.index');
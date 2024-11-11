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

//Rutas de Areas
Route::get('/areas', [AreaController::class, 'index'])
    ->name('areas.index');
Route::get('/areas/create', [AreaController::class, 'create'])
    ->name('areas.create');
Route::post('/areas', [AreaController::class, 'store'])
    ->name('areas.store');
Route::get('/areas/{area}', [AreaController::class, 'show'])
    ->name('areas.show');
Route::get('/areas/{area}/edit', [AreaController::class, 'edit'])
    ->name('areas.edit');
Route::put('/areas/{area}', [AreaController::class, 'update'])
    ->name('areas.update');
Route::delete('/areas/{area}', [AreaController::class, 'destroy'])
    ->name('areas.destroy');

//Rutas de Cargos
Route::get('/cargos', [CargoController::class, 'index'])
    ->name('cargos.index');
Route::get('/cargos/create', [CargoController::class, 'create'])
    ->name('cargos.create');
Route::post('/cargos', [CargoController::class, 'store'])
    ->name('cargos.store');
Route::get('/cargos/{cargo}', [CargoController::class, 'show'])
    ->name('cargos.show');
Route::get('/cargos/{cargo}/edit', [CargoController::class, 'edit'])
    ->name('cargos.edit');
Route::put('/cargos/{cargo}', [CargoController::class, 'update'])
    ->name('cargos.update');
Route::delete('/cargos/{cargo}', [CargoController::class, 'destroy'])    
    ->name('cargos.destroy');

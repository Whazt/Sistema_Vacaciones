<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCargoRequest;

class CargoController extends Controller
{
    public function index()
    {
        
        return view('paginas.cargos');
    }

}

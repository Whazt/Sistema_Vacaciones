<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VacacionesController extends Controller
{
    public function index()
    {
        return view('paginas.vacaciones');
    }
}

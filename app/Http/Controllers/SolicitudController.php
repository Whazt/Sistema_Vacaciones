<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index()
    {
        return view('paginas.solicitudes');
    }

    public function MisSolicitudes()
    {
        return view('paginas.misSolicitudes');
    }
}

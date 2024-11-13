<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAreaRequest;
use App\Models\Area;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class AreaController extends Controller
{
     public function index()
    {
        return view('paginas.areas');
    }

}

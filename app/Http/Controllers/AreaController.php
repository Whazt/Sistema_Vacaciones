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
        $areas = Area::all();
        return view('areas.index', compact('areas'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(StoreAreaRequest $request)
    {
        $area = new Area;
        $area->nombre=$request->nombre;
        $area->descripcion=$request->descripcion;
        $area->save();

        return redirect()->route('areas.index');
    }

    public function show($id)
    {
        $area = Area::find($id);

        return view('areas.show', compact('area'));
    }

    public function edit($id)
    {
        $area = Area::find($id);

        return view('areas.edit', compact('area'));
    }

    public function update(StoreAreaRequest $request, $id)
    {

        $area = Area::find($id);
        $area->nombre=$request->nombre;
        $area->descripcion=$request->descripcion;
        $area->save();

        return redirect()->route('areas.index');
    }

    public function destroy($id)
    {
        $area = Area::find($id);
        $area->delete();

        return redirect()->route('areas.index');
    }
}

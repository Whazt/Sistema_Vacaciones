<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCargoRequest;

class CargoController extends Controller
{
    public function index()
    {
        $cargo = Cargo::all();
        return view('areas.index', compact('areas'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(StoreCargoRequest $request)
    {
        $cargo = new Cargo;
        $cargo->id_area=$request->id_area;
        $cargo->nombre=$request->nombre;
        $cargo->descripcion=$request->descripcion;
        $cargo->save();

        return redirect()->route('areas.index');
    }

    public function show($id)
    {
        $cargo = Cargo::find($id);

        return view('areas.show', compact('area'));
    }

    public function edit($id)
    {
        $cargo = Cargo::find($id);

        return view('areas.edit', compact('area'));
    }

    public function update(StoreCargoRequest $request, $id)
    {

        $cargo = Cargo::find($id);
        $cargo->id_area=$request->id_area;
        $cargo->nombre=$request->nombre;
        $cargo->descripcion=$request->descripcion;
        $cargo->save();

        return redirect()->route('areas.index');
    }

    public function destroy($id)
    {
        $cargo = Cargo::find($id);
        $cargo->delete();

        return redirect()->route('areas.index');
    }
}

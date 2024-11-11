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
        return view('cargos.index', compact('cargo'));
    }

    public function create()
    {
        return view('cargos.create');
    }

    public function store(StoreCargoRequest $request)
    {
        $cargo = new Cargo;
        $cargo->id_area=$request->id_area;
        $cargo->nombre=$request->nombre;
        $cargo->descripcion=$request->descripcion;
        $cargo->save();

        return redirect()->route('cargos.index');
    }

    public function show($id)
    {
        $cargo = Cargo::find($id);

        return view('cargos.show', compact('cargo'));
    }

    public function edit($id)
    {
        $cargo = Cargo::find($id);

        return view('cargos.edit', compact('cargo'));
    }

    public function update(StoreCargoRequest $request, $id)
    {

        $cargo = Cargo::find($id);
        $cargo->id_area=$request->id_area;
        $cargo->nombre=$request->nombre;
        $cargo->descripcion=$request->descripcion;
        $cargo->save();

        return redirect()->route('cargos.index');
    }

    public function destroy($id)
    {
        $cargo = Cargo::find($id);
        $cargo->delete();

        return redirect()->route('cargos.index');
    }
}

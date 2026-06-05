<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        return response()->json(Cargo::all());
    }

    public function store(Request $request)
    {
        $cargo = Cargo::create($request->all());

        return response()->json($cargo, 201);
    }

    public function show(Cargo $cargo)
    {
        return response()->json($cargo);
    }

    public function update(Request $request, Cargo $cargo)
    {
        $cargo->update($request->all());

        return response()->json($cargo);
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->delete();

        return response()->json([
            'message' => 'Cargo eliminado correctamente'
        ]);
    }
}

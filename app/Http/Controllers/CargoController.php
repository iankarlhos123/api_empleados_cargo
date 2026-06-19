<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        return response()->json(Cargo::paginate(10));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_cargo' => 'required|string|max:100|unique:cargos,nombre_cargo',
            'descripcion' => 'nullable|string',
        ], [
            'nombre_cargo.required' => 'El nombre del cargo es obligatorio.',
            'nombre_cargo.max' => 'El nombre del cargo no puede superar los 100 caracteres.',
            'nombre_cargo.unique' => 'Ya existe un cargo con ese nombre.',
        ]);

        $cargo = Cargo::create($validated);

        return response()->json([
            'message' => 'Cargo creado correctamente.',
            'data' => $cargo,
        ], 201);
    }

    public function show(Cargo $cargo)
    {
        return response()->json($cargo->load('funciones'));
    }

    public function update(Request $request, Cargo $cargo)
    {
        $validated = $request->validate([
            'nombre_cargo' => 'sometimes|required|string|max:100|unique:cargos,nombre_cargo,'.$cargo->id_cargo.',id_cargo',
            'descripcion' => 'nullable|string',
        ], [
            'nombre_cargo.required' => 'El nombre del cargo es obligatorio.',
            'nombre_cargo.unique' => 'Ya existe un cargo con ese nombre.',
        ]);

        $cargo->update($validated);

        return response()->json([
            'message' => 'Cargo actualizado correctamente.',
            'data' => $cargo,
        ]);
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->delete();

        return response()->json([
            'message' => 'Cargo eliminado correctamente.',
        ]);
    }
}

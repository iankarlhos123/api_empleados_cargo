<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\FuncionCargo;
use Illuminate\Http\Request;

class FuncionCargoController extends Controller
{
    public function index()
    {
        return response()->json(
            FuncionCargo::with('cargo')->get()
        );
    }

    public function porCargo(Cargo $cargo)
    {
        return response()->json([
            'cargo'     => $cargo->nombre_cargo,
            'funciones' => $cargo->funciones,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion_funcion' => 'required|string|max:500',
            'estado'              => 'boolean',
            'id_cargo'            => 'required|exists:cargos,id_cargo',
        ], [
            'descripcion_funcion.required' => 'La descripción de la función es obligatoria.',
            'descripcion_funcion.max'      => 'La descripción no puede superar los 500 caracteres.',
            'id_cargo.required'            => 'Debe asociar la función a un cargo.',
            'id_cargo.exists'              => 'El cargo seleccionado no existe.',
        ]);

        $funcion = FuncionCargo::create($validated);

        return response()->json([
            'message' => 'Función creada correctamente.',
            'data'    => $funcion->load('cargo'),
        ], 201);
    }

    public function show(FuncionCargo $funcionCargo)
    {
        return response()->json($funcionCargo->load('cargo'));
    }

    public function update(Request $request, FuncionCargo $funcionCargo)
    {
        $validated = $request->validate([
            'descripcion_funcion' => 'sometimes|required|string|max:500',
            'estado'              => 'boolean',
            'id_cargo'            => 'sometimes|required|exists:cargos,id_cargo',
        ], [
            'descripcion_funcion.required' => 'La descripción de la función es obligatoria.',
            'descripcion_funcion.max'      => 'La descripción no puede superar los 500 caracteres.',
            'id_cargo.exists'              => 'El cargo seleccionado no existe.',
        ]);

        $funcionCargo->update($validated);

        return response()->json([
            'message' => 'Función actualizada correctamente.',
            'data'    => $funcionCargo->load('cargo'),
        ]);
    }

    public function destroy(FuncionCargo $funcionCargo)
    {
        $funcionCargo->delete();

        return response()->json([
            'message' => 'Función eliminada correctamente.',
        ]);
    }
}
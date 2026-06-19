<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        return response()->json(Empleado::with('cargo')->paginate(10));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'nullable|date|before:today',
            'fecha_ingreso' => 'nullable|date',
            'salario' => 'nullable|numeric|min:0',
            'estado' => 'boolean',
            'id_cargo' => 'required|exists:cargos,id_cargo',
        ], [
            'nombres.required' => 'El nombre del empleado es obligatorio.',
            'apellidos.required' => 'Los apellidos del empleado son obligatorios.',
            'fecha_nacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
            'salario.numeric' => 'El salario debe ser un numero.',
            'salario.min' => 'El salario no puede ser negativo.',
            'id_cargo.required' => 'Debe asignar un cargo al empleado.',
            'id_cargo.exists' => 'El cargo seleccionado no existe.',
        ]);

        $empleado = Empleado::create($validated);

        return response()->json([
            'message' => 'Empleado creado correctamente.',
            'data' => $empleado->load('cargo'),
        ], 201);
    }

    public function show(Empleado $empleado)
    {
        $empleado->load(['cargo.funciones']);

        return response()->json([
            'id_empleado' => $empleado->id_empleado,
            'nombres' => $empleado->nombres,
            'apellidos' => $empleado->apellidos,
            'salario' => $empleado->salario,
            'estado' => $empleado->estado,
            'fecha_nacimiento' => $empleado->fecha_nacimiento,
            'fecha_ingreso' => $empleado->fecha_ingreso,
            'cargo' => [
                'id_cargo' => $empleado->cargo->id_cargo,
                'nombre_cargo' => $empleado->cargo->nombre_cargo,
                'descripcion' => $empleado->cargo->descripcion,
                'funciones' => $empleado->cargo->funciones,
            ],
        ]);
    }

    public function update(Request $request, Empleado $empleado)
    {
        $validated = $request->validate([
            'nombres' => 'sometimes|required|string|max:255',
            'apellidos' => 'sometimes|required|string|max:255',
            'fecha_nacimiento' => 'nullable|date|before:today',
            'fecha_ingreso' => 'nullable|date',
            'salario' => 'nullable|numeric|min:0',
            'estado' => 'boolean',
            'id_cargo' => 'sometimes|required|exists:cargos,id_cargo',
        ], [
            'nombres.required' => 'El nombre del empleado es obligatorio.',
            'apellidos.required' => 'Los apellidos del empleado son obligatorios.',
            'salario.numeric' => 'El salario debe ser un numero.',
            'salario.min' => 'El salario no puede ser negativo.',
            'id_cargo.exists' => 'El cargo seleccionado no existe.',
        ]);

        $empleado->update($validated);

        return response()->json([
            'message' => 'Empleado actualizado correctamente.',
            'data' => $empleado->load('cargo'),
        ]);
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return response()->json([
            'message' => 'Empleado eliminado correctamente.',
        ]);
    }
}

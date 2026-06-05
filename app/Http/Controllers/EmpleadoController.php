<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        return response()->json(
            Empleado::with('cargo')->get()
        );
    }

    public function store(Request $request)
    {
        $empleado = Empleado::create($request->all());

        return response()->json($empleado, 201);
    }

    public function show(Empleado $empleado)
    {
        return response()->json(
            $empleado->load('cargo')
        );
    }

    public function update(Request $request, Empleado $empleado)
    {
        $empleado->update($request->all());

        return response()->json($empleado);
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return response()->json([
            'message' => 'Empleado eliminado correctamente'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $funcion = FuncionCargo::create($request->all());

        return response()->json($funcion, 201);
    }

    public function show(FuncionCargo $funcionCargo)
    {
        return response()->json($funcionCargo);
    }

    public function update(Request $request, FuncionCargo $funcionCargo)
    {
        $funcionCargo->update($request->all());

        return response()->json($funcionCargo);
    }

    public function destroy(FuncionCargo $funcionCargo)
    {
        $funcionCargo->delete();

        return response()->json([
            'message' => 'Función eliminada correctamente'
        ]);
    }
}

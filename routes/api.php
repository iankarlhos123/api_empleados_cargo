<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FuncionCargoController;

Route::post('login',  [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('empleados',                                 [EmpleadoController::class, 'index']);
Route::get('empleados/{empleado}',                      [EmpleadoController::class, 'show']);
Route::get('cargos',                                    [CargoController::class, 'index']);
Route::get('cargos/{cargo}',                            [CargoController::class, 'show']);
Route::get('funciones-cargo',                           [FuncionCargoController::class, 'index']);
Route::get('funciones-cargo/{funcionCargo:id_funcion}', [FuncionCargoController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('empleados',              [EmpleadoController::class, 'store']);
    Route::put('empleados/{empleado}',    [EmpleadoController::class, 'update']);
    Route::patch('empleados/{empleado}',  [EmpleadoController::class, 'update']);
    Route::delete('empleados/{empleado}', [EmpleadoController::class, 'destroy']);

    Route::post('cargos',                 [CargoController::class, 'store']);
    Route::put('cargos/{cargo}',          [CargoController::class, 'update']);
    Route::patch('cargos/{cargo}',        [CargoController::class, 'update']);
    Route::delete('cargos/{cargo}',       [CargoController::class, 'destroy']);
});
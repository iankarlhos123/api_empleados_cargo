<?php

use App\Models\Cargo;
use App\Models\FuncionCargo;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('puede crear una funcion de cargo', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'descripcion' => 'Desarrolla software',
    ]);

    $response = $this->postJson('/api/funciones-cargo', [
        'descripcion_funcion' => 'Desarrollar aplicaciones',
        'estado' => true,
        'id_cargo' => $cargo->id_cargo,
    ]);

    $response->assertStatus(201);

    $this->assertDatabaseHas('funciones_cargo', [
        'descripcion_funcion' => 'Desarrollar aplicaciones',
    ]);
});

test('puede mostrar una funcion de cargo', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'descripcion' => 'Desarrolla software',
    ]);

    $funcion = FuncionCargo::create([
        'descripcion_funcion' => 'Desarrollar aplicaciones',
        'estado' => true,
        'id_cargo' => $cargo->id_cargo,
    ]);

    $response = $this->getJson("/api/funciones-cargo/{$funcion->id_funcion}");

    $response->assertStatus(200);

    $response->assertJson([
        'id_funcion' => $funcion->id_funcion,
        'descripcion_funcion' => 'Desarrollar aplicaciones',
    ]);
});
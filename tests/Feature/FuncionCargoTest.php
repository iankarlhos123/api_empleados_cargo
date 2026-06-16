<?php

use App\Models\Cargo;
use App\Models\FuncionCargo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('puede crear una funcion de cargo', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'descripcion' => 'Desarrolla software',
    ]);

    $response = $this->actingAs($this->user)->postJson('/api/funciones-cargo', [
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

test('puede actualizar una funcion de cargo', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'descripcion' => 'Desarrolla software',
    ]);

    $funcion = FuncionCargo::create([
        'descripcion_funcion' => 'Desarrollar aplicaciones',
        'estado' => true,
        'id_cargo' => $cargo->id_cargo,
    ]);

    $response = $this->actingAs($this->user)->putJson("/api/funciones-cargo/{$funcion->id_funcion}", [
        'descripcion_funcion' => 'Desarrollar sistemas',
        'estado' => false,
        'id_cargo' => $cargo->id_cargo,
    ]);

    $response->assertStatus(200);

    $this->assertDatabaseHas('funciones_cargo', [
        'id_funcion' => $funcion->id_funcion,
        'descripcion_funcion' => 'Desarrollar sistemas',
    ]);
});

test('puede eliminar una funcion de cargo', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'descripcion' => 'Desarrolla software',
    ]);

    $funcion = FuncionCargo::create([
        'descripcion_funcion' => 'Desarrollar aplicaciones',
        'estado' => true,
        'id_cargo' => $cargo->id_cargo,
    ]);

    $response = $this->actingAs($this->user)->deleteJson(
        "/api/funciones-cargo/{$funcion->id_funcion}"
    );

    $response->assertStatus(200);

    $this->assertDatabaseMissing('funciones_cargo', [
        'id_funcion' => $funcion->id_funcion,
    ]);
});
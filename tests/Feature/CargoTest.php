<?php

use App\Models\Cargo;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('puede crear un cargo', function () {

    $response = $this->postJson('/api/cargos', [
        'nombre_cargo' => 'Programador',
        'descripcion' => 'Desarrolla software',
    ]);

    $response->assertStatus(201);

    $this->assertDatabaseHas('cargos', [
        'nombre_cargo' => 'Programador',
    ]);
});

test('puede mostrar un cargo', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'descripcion' => 'Desarrolla software',
    ]);

    $response = $this->getJson("/api/cargos/{$cargo->id_cargo}");

    $response->assertStatus(200);

    $response->assertJson([
        'id_cargo' => $cargo->id_cargo,
        'nombre_cargo' => 'Programador',
    ]);
});

test('puede actualizar un cargo', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'descripcion' => 'Desarrolla software',
    ]);

    $response = $this->putJson("/api/cargos/{$cargo->id_cargo}", [
        'nombre_cargo' => 'Analista',
        'descripcion' => 'Analiza sistemas',
    ]);

    $response->assertStatus(200);

    $this->assertDatabaseHas('cargos', [
        'id_cargo' => $cargo->id_cargo,
        'nombre_cargo' => 'Analista',
    ]);
});

test('puede eliminar un cargo', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'descripcion' => 'Desarrolla software',
    ]);

    $response = $this->deleteJson(
        "/api/cargos/{$cargo->id_cargo}"
    );

    $response->assertStatus(200);

    $this->assertDatabaseMissing('cargos', [
        'id_cargo' => $cargo->id_cargo,
    ]);
});
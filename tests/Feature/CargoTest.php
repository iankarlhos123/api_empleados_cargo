<?php

use App\Models\Cargo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('puede crear un cargo', function () {

    $response = $this->actingAs($this->user)->postJson('/api/cargos', [
        'nombre_cargo' => 'Programador',
        'salario_base' => 2500000,
        'estado' => 'activo',
    ]);

    $response->assertStatus(201);

    $this->assertDatabaseHas('cargos', [
        'nombre_cargo' => 'Programador',
    ]);
});

test('puede mostrar un cargo', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'salario_base' => 2500000,
        'estado' => 'activo',
    ]);

    $response = $this->actingAs($this->user)->getJson("/api/cargos/{$cargo->id}");

    $response->assertStatus(200);

    $response->assertJson([
        'id' => $cargo->id,
        'nombre_cargo' => 'Programador',
    ]);
});

test('puede actualizar un cargo', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'salario_base' => 2500000,
        'estado' => 'activo',
    ]);

    $response = $this->actingAs($this->user)->putJson("/api/cargos/{$cargo->id}", [
        'nombre_cargo' => 'Analista',
        'salario_base' => 3000000,
        'estado' => 'activo',
    ]);

    $response->assertStatus(200);

    $this->assertDatabaseHas('cargos', [
        'id' => $cargo->id,
        'nombre_cargo' => 'Analista',
    ]);
});

test('puede eliminar un cargo', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'salario_base' => 2500000,
        'estado' => 'activo',
    ]);

    $response = $this->actingAs($this->user)->deleteJson(
        "/api/cargos/{$cargo->id}"
    );

    $response->assertStatus(200);

    $this->assertDatabaseMissing('cargos', [
        'id' => $cargo->id,
    ]);
});

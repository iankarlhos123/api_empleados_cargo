
<?php

use App\Models\Cargo;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('puede crear un empleado', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'salario_base' => 2500000,
        'estado' => 'activo',
    ]);

    $response = $this->actingAs($this->user)->postJson('/api/empleados', [
        'nombres' => 'ian',
        'apellidos' => 'solano',
        'fecha_nacimiento' => '2000-05-10',
        'fecha_ingreso' => '2026-06-04',
        'salario' => 250000,
        'estado' => true,
        'id_cargo' => $cargo->id,
    ]);

    $response->assertStatus(201);

    $this->assertDatabaseHas('empleados', [
        'nombres' => 'ian',
        'apellidos' => 'solano',
    ]);
});

test('puede mostrar un empleado', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'salario_base' => 2500000,
        'estado' => 'activo',
    ]);

    $empleado = Empleado::create([
        'nombres' => 'lucho',
        'apellidos' => 'Diaz',
        'estado' => true,
        'id_cargo' => $cargo->id,
    ]);

    $response = $this->actingAs($this->user)->getJson("/api/empleados/{$empleado->id}");

    $response->assertStatus(200);

    $response->assertJson([
        'id' => $empleado->id,
        'nombres' => 'lucho',
    ]);
});

test('puede actualizar un empleado', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'salario_base' => 2500000,
        'estado' => 'activo',
    ]);

    $empleado = Empleado::create([
        'nombres' => 'juan',
        'apellidos' => 'solano',
        'estado' => true,
        'id_cargo' => $cargo->id,
    ]);

    $response = $this->actingAs($this->user)->putJson("/api/empleados/{$empleado->id}", [
        'nombres' => 'Juan',
        'apellidos' => 'Perez',
        'estado' => false,
        'id_cargo' => $cargo->id,
    ]);

    $response->assertStatus(200);

    $this->assertDatabaseHas('empleados', [
        'id' => $empleado->id,
        'nombres' => 'Juan',
        'apellidos' => 'Perez',
    ]);
});

test('puede eliminar un empleado', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'salario_base' => 2500000,
        'estado' => 'activo',
    ]);

    $empleado = Empleado::create([
        'nombres' => 'ivan',
        'apellidos' => 'alguero',
        'estado' => true,
        'id_cargo' => $cargo->id,
    ]);

    $response = $this->actingAs($this->user)->deleteJson(
        "/api/empleados/{$empleado->id}"
    );

    $response->assertStatus(200);

    $this->assertDatabaseMissing('empleados', [
        'id' => $empleado->id,
    ]);
});

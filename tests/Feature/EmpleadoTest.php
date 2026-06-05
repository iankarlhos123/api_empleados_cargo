
<?php

use App\Models\Cargo;
use App\Models\Empleado;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('puede crear un empleado', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'descripcion' => 'Desarrolla software',
    ]);

    $response = $this->postJson('/api/empleados', [
        'nombres' => 'ian',
        'apellidos' => 'solano',
        'fecha_nacimiento' => '2000-05-10',
        'fecha_ingreso' => '2026-06-04',
        'salario' => 250000,
        'estado' => true,
        'id_cargo' => $cargo->id_cargo,
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
        'descripcion' => 'Desarrolla software',
    ]);

    $empleado = Empleado::create([
        'nombres' => 'lucho',
        'apellidos' => 'Diaz',
        'estado' => true,
        'id_cargo' => $cargo->id_cargo,
    ]);

    $response = $this->getJson("/api/empleados/{$empleado->id_empleado}");

    $response->assertStatus(200);

    $response->assertJson([
        'id_empleado' => $empleado->id_empleado,
        'nombres' => 'lucho',
    ]);
});

test('puede actualizar un empleado', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'descripcion' => 'Desarrolla software',
    ]);

    $empleado = Empleado::create([
        'nombres' => 'juan',
        'apellidos' => 'solano',
        'estado' => true,
        'id_cargo' => $cargo->id_cargo,
    ]);

    $response = $this->putJson("/api/empleados/{$empleado->id_empleado}", [
        'nombres' => 'Juan',
        'apellidos' => 'Perez',
        'estado' => false,
        'id_cargo' => $cargo->id_cargo,
    ]);

    $response->assertStatus(200);

    $this->assertDatabaseHas('empleados', [
        'id_empleado' => $empleado->id_empleado,
        'nombres' => 'Juan',
        'apellidos' => 'Perez',
    ]);
});

test('puede eliminar un empleado', function () {

    $cargo = Cargo::create([
        'nombre_cargo' => 'Programador',
        'descripcion' => 'Desarrolla software',
    ]);

    $empleado = Empleado::create([
        'nombres' => 'ivan',
        'apellidos' => 'alguero',
        'estado' => true,
        'id_cargo' => $cargo->id_cargo,
    ]);

    $response = $this->deleteJson(
        "/api/empleados/{$empleado->id_empleado}"
    );

    $response->assertStatus(200);

    $this->assertDatabaseMissing('empleados', [
        'id_empleado' => $empleado->id_empleado,
    ]);
});
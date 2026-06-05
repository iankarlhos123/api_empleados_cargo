<?php

use App\Models\Cargo;       
use App\Models\Empleado; 
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


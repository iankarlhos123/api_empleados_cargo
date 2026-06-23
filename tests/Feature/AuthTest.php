<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

uses(RefreshDatabase::class);

test('un usuario se puede registrar pero no recibe token', function () {
    $response = $this->postJson('/api/register', [
        'name' => 'Ian Karlhos',
        'email' => 'ian@example.com',
        'password' => 'password123',
    ]);

    $response->assertStatus(201);

    $this->assertArrayNotHasKey('token', $response->json());

    $response->assertJson([
        'message' => 'Usuario registrado correctamente.',
        'user' => [
            'name' => 'Ian Karlhos',
            'email' => 'ian@example.com',
        ],
    ]);

    $this->assertDatabaseHas('users', [
        'email' => 'ian@example.com',
    ]);
});

test('un usuario puede hacer login y obtiene un token', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password123'),
    ]);

    $response = $this->postJson('/api/login', [
        'email' => 'test@example.com',
        'password' => 'password123',
    ]);

    $response->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'token',
        ]);
});

test('un nuevo login invalida los tokens anteriores del usuario', function () {
    User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password123'),
    ]);

    $firstToken = $this->postJson('/api/login', [
        'email' => 'test@example.com',
        'password' => 'password123',
    ])->json('token');

    $secondToken = $this->postJson('/api/login', [
        'email' => 'test@example.com',
        'password' => 'password123',
    ])->json('token');

    Auth::guard('web')->logout();

    expect($firstToken)->not->toBe($secondToken);

    $this->withHeaders([
        'Authorization' => "Bearer {$firstToken}",
    ])->getJson('/api/empleados')->assertUnauthorized();

    $this->withHeaders([
        'Authorization' => "Bearer {$secondToken}",
    ])->getJson('/api/empleados')->assertSuccessful();

    $this->assertDatabaseCount('personal_access_tokens', 1);
});

test('un usuario puede hacer logout', function () {
    $user = User::factory()->create();
    $token = $user->createToken('test-token')->plainTextToken;

    $response = $this->withHeaders([
        'Authorization' => "Bearer {$token}",
    ])->postJson('/api/logout');

    $response->assertStatus(200)
        ->assertJson([
            'message' => 'Sesion cerrada correctamente.',
        ]);
});

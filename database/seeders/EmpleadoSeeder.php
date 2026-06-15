<?php

namespace Database\Seeders;

use App\Models\Cargo;
use App\Models\Empleado;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    public function run(): void
    {
        $ids = Cargo::all()->pluck('id_cargo')->shuffle()->take(30)->all();

        foreach ($ids as $id_cargo) {
            Empleado::factory()->create([
                'id_cargo' => $id_cargo,
            ]);
        }
    }
}

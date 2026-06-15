<?php

namespace Database\Seeders;

use App\Models\Cargo;
use App\Models\Empleado;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    public function run(): void
    {
        $ids = Cargo::pluck('id_cargo')->toArray();

        for ($i = 0; $i < 30; $i++) {
            Empleado::factory()->create([
                'id_cargo' => $ids[array_rand($ids)],
            ]);
        }
    }
}

<?php

namespace Database\Factories;

use App\Models\Cargo;
use App\Models\FuncionCargo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FuncionCargo>
 */
class FuncionCargoFactory extends Factory
{
    protected $model = FuncionCargo::class;

    public function definition(): array
    {
        return [
            'descripcion_funcion' => $this->faker->sentence(),
            'estado' => true,
            'id_cargo' => Cargo::factory(),
        ];
    }
}

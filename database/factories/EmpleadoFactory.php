<?php

namespace Database\Factories;

use App\Models\Cargo;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Empleado>
 */
class EmpleadoFactory extends Factory
{
    protected $model = Empleado::class;

    public function definition(): array
    {
        return [
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'fecha_nacimiento' => $this->faker->date(),
            'fecha_ingreso' => $this->faker->date(),
            'salario' => $this->faker->randomFloat(2, 1000000, 5000000),
            'estado' => true,
            'id_cargo' => Cargo::factory(),
        ];
    }
}

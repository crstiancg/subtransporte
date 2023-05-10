<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tipo>
 */
class TipoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'codigo'=> fake()->regexify('[A-Z]{1}[0-100]{1}'),
            'porcentaje_base' => fake()->randomFloat(1,0,1),
        ];
    }
}

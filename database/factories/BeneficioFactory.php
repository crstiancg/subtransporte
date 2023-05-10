<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beneficio>
 */
class BeneficioFactory extends Factory
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
            'codigo'=> fake()->regexify('[A-Z]{5}[0-4]{3}'),
            'orden' => fake()->randomNumber(2,true),
            'descuento' => fake()->randomFloat(2,0,1),
        ];
    }
}

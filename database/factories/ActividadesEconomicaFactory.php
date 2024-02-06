<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActividadesEconomica>
 */
class ActividadesEconomicaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      return [
        'codSubClase' => str_pad($this->faker->randomNumber(9), 9, '0', STR_PAD_LEFT),
        'descripcion' => $this->faker->word,
        'is_active' => true
      ];
    }
}

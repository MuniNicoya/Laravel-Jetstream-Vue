<?php

namespace Database\Factories;
use App\Models\CatalogoCuenta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CatalogoCuenta>
 */
class CatalogoCuentaFactory extends Factory
{

    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      return [
        'code' => $this->faker->randomNumber(),
        'description' => $this->faker->word,
        'sign' => $this->faker->randomDigit,
        'level' => $this->faker->randomDigit,
        'vigencia' => $this->faker->dateTime(),
        'is_enabled' => $this->faker->boolean,
        'type' => $this->faker->randomDigit,
        'created_by' => $this->faker->randomDigit,
    ];
    
    }
}

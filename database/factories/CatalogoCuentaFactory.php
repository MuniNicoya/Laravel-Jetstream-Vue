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
        'cuenta' => $this->faker->randomNumber(),
        'descripcion' => $this->faker->word,
        'signo' => $this->faker->randomDigit,
        'nivel' => $this->faker->randomDigit,
        'vigencia' => $this->faker->dateTime(),
        'activa' => $this->faker->boolean,
        'tipo' => $this->faker->randomDigit,
        //--
        'status' => 10,
        'type' => 0,
        'team_id' => 1,
        //'created_by' => $this->faker->randomDigit,
    ];
    
    }
}

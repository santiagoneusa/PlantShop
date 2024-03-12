<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlantFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->sentence,
            'imageUrl' => $this->faker->imageUrl(),
            'price' => $this->faker->numberBetween($min = 200, $max = 9000),
            'stock' => $this->faker->numberBetween($min = 0, $max = 100),
        ];
    }
}

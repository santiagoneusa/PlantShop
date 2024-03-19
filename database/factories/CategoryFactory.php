<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'Category '.$this->faker->numberBetween(1, 10),
            'description' => $this->faker->sentence,
            'image' => $this->faker->numberBetween(1, 4).'.jpg',
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Plant;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlantFactory extends Factory
{
    protected $model = Plant::class;

    public function definition(): array
    {
        $category = Category::first() ?? Category::factory()->create();

        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'image' => 'plant0.png',
            'price' => $this->faker->numberBetween(100, 1000),
            'stock' => $this->faker->numberBetween(1, 100),
            'category_id' => $category->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

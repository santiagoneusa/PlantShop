<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Plant;
use Illuminate\Database\Seeder;

class PlantSeeder extends Seeder
{
    public function run(): void
    {
        Plant::whereIn('name', ['Rose', 'Snake Plant', 'Lavender', 'Sunflower', 'Basil'])->delete();

        $plants = [
            [
                'name' => 'Rose',
                'description' => 'A beautiful flower often associated with love and romance.',
                'image' => 'rose.jpg',
                'price' => 20.50,
                'stock' => 100,
                'category_id' => Category::where('name', 'Ornamental')->first()->id,
            ],
            [
                'name' => 'Snake Plant',
                'description' => 'An indoor plant known for its ability to purify air and thrive in low light conditions.',
                'image' => 'snake_plant.jpg',
                'price' => 15.75,
                'stock' => 80,
                'category_id' => Category::where('name', 'Indoor')->first()->id,
            ],
            [
                'name' => 'Lavender',
                'description' => 'An aromatic herb with a pleasant fragrance used in cooking and aromatherapy.',
                'image' => 'lavender.jpg',
                'price' => 12.00,
                'stock' => 120,
                'category_id' => Category::where('name', 'Aromatic')->first()->id,
            ],
            [
                'name' => 'Sunflower',
                'description' => 'A bright and cheerful flower that follows the sun throughout the day.',
                'image' => 'sunflower.jpg',
                'price' => 18.25,
                'stock' => 90,
                'category_id' => Category::where('name', 'Outdoor')->first()->id,
            ],
            [
                'name' => 'Basil',
                'description' => 'A culinary herb known for its strong aroma and use in Italian cuisine.',
                'image' => 'basil.jpg',
                'price' => 10.50,
                'stock' => 110,
                'category_id' => Category::where('name', 'Aromatic')->first()->id,
            ],
        ];

        foreach ($plants as $plantData) {
            Plant::create($plantData);
        }
    }
}

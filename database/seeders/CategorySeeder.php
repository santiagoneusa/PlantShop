<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Ornamental',
                'description' => 'Plants grown for decorative purposes, often for their flowers, foliage, or overall appearance.',
                'image' => '1.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Indoor',
                'description' => 'Plants that require a low amount of light and water to thrive. They are found in places like residences and offices.',
                'image' => '2.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Outdoor',
                'description' => 'Plants that need low maintenance and grow up easily on the outside. Intended to be part of a garden.',
                'image' => '3.jpg',
            ],
            [
                'id' => 4,
                'name' => 'Aromatic',
                'description' => 'Plants valued for their pleasant fragrance, often used in cooking, aromatherapy, or medicinal purposes.',
                'image' => '4.jpg',
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}

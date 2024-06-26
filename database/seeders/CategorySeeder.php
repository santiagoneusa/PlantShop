<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categoryNames = ['Ornamental', 'Indoor', 'Outdoor', 'Aromatic'];
        $categories = Category::whereIn('name', $categoryNames)->get();

        foreach ($categories as $category) {
            Plant::where('category_id', $category->id)->delete();
            $category->delete();
        }

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

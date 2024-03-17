<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->text('image');

            $table->timestamps();
        });

        DB::table('categories')->insert([
            ['name' => 'Ornamental', 'description' => 'Plants grown for decorative purposes, often for their flowers, foliage, or overall appearance.', 'image' => '1.jpg'],
            ['name' => 'Indoor', 'description' => 'Plants that require a low amount of light and water to thrive. They are found in places like residences and offices.', 'image' => '2.jpg'],
            ['name' => 'Outdoor', 'description' => 'Plants that need low maintenance and grow up easily on the outside. Intended to be part of a garden.', 'image' => '3.jpg'],
            ['name' => 'Aromatic', 'description' => 'Plants valued for their pleasant fragrance, often used in cooking, aromatherapy, or medicinal purposes.', 'image' => '4.jpg'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');

            $table->timestamps();
        });

        DB::table('categories')->insert([
            ['name' => 'Ornamental Plants', 'description' => 'Description of Ornamental Plants'],
            ['name' => 'Indoor Plants', 'description' => 'Description of Indoor Plants'],
            ['name' => 'Edible Plants', 'description' => 'Description of Edible Plants'],
            ['name' => 'Medicinal Plants', 'description' => 'Description of Medicinal Plants'],
            ['name' => 'Succulent Plants', 'description' => 'Description of Succulent Plants'],
            ['name' => 'Aromatic Plants', 'description' => 'Description of Aromatic Plants'],
        ]);

        Schema::table('plants', function (Blueprint $table) {
            $table->unsignedBigInteger('categoryId');
            $table->foreign('categoryId')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->dropForeign(['categoryId']);
        });

        Schema::dropIfExists('categories');
    }
};

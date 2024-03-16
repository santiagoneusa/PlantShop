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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->unsignedTinyInteger('stars');
            $table->enum('status', ['unchecked', 'approved', 'rejected'])->default('unchecked');
            $table->unsignedBigInteger('plant_id');
            $table->foreign('plant_id')->references('id')->on('plants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

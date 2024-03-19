<?php

// Made by: Jhonnathan Stiven Ocampo Díaz

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGuidesTableAddDefaultImage extends Migration
{
    public function up(): void
    {
        Schema::table('guides', function (Blueprint $table) {
            $table->string('image')->default('category0.png')->change();
        });
    }

    public function down(): void
    {
        Schema::table('guides', function (Blueprint $table) {
            $table->string('image')->change();
        });
    }
}

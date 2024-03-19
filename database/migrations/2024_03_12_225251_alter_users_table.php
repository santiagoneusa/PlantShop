<?php

// Made by: Santiago Neusa Ruiz

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('image')->default('user0.jpg');
            $table->enum('role', (['client', 'admin']))->default('client');
            $table->integer('balance')->default(100);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['image']);
            $table->dropColumn(['role']);
            $table->dropColumn(['balance']);
        });
    }
};

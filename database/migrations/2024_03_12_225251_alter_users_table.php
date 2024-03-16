<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('image_url')->default('user0.jpg');
            $table->string('role')->default('client');
            $table->integer('balance')->default(100);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['image_url']);
            $table->dropColumn(['role']);
            $table->dropColumn(['balance']);
        });
    }
};

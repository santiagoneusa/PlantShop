<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'superusuario@gmail.com',
            'password' => Hash::make('123456789'),
            'image' => 'user0.jpg',
            'role' => 'admin',
            'balance' => 100, 
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'superusuario@gmail.com')->first();

        if ($user) {
            Order::where('user_id', $user->id)->delete();

            $user->delete();
        }

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

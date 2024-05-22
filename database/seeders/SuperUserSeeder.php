<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperUserSeeder extends Seeder
{
    public function run(): void
    {
        // Encuentra el usuario con el email especificado
        $user = User::where('email', 'superusuario@gmail.com')->first();

        if ($user) {
            // Encuentra todas las órdenes asociadas a este usuario
            $orders = Order::where('user_id', $user->id)->get();

            foreach ($orders as $order) {
                // Elimina todos los ítems asociados a cada orden
                Item::where('order_id', $order->id)->delete();

                // Elimina la orden
                $order->delete();
            }

            // Elimina el usuario
            $user->delete();
        }

        // Crear el superusuario
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

<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        $carts = [
            ['user_id' => 1],
            ['user_id' => 2],
            ['user_id' => 3],
            ['user_id' => 4],
            ['user_id' => 5],
            ['user_id' => 6]
        ];

        foreach ($carts as $cart) {
            Cart::create($cart);
        }
    }
}

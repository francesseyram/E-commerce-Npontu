<?php

namespace Database\Seeders;

use App\Models\CartItem;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    public function run(): void
    {
        $cartItems = [
            ['cart_id' => 1, 'product_id' => 1, 'quantity' => 2],
            ['cart_id' => 1, 'product_id' => 3, 'quantity' => 1],
            ['cart_id' => 2, 'product_id' => 2, 'quantity' => 1],
            ['cart_id' => 2, 'product_id' => 4, 'quantity' => 3],
            ['cart_id' => 3, 'product_id' => 5, 'quantity' => 1],
            ['cart_id' => 4, 'product_id' => 6, 'quantity' => 2]
        ];

        foreach ($cartItems as $item) {
            CartItem::create($item);
        }
    }
}

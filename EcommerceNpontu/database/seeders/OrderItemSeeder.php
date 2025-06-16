<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        $orderItems = [
            ['order_id' => 1, 'product_id' => 1, 'quantity' => 2, 'price' => 500.00],
            ['order_id' => 2, 'product_id' => 3, 'quantity' => 3, 'price' => 20.00],
            ['order_id' => 3, 'product_id' => 2, 'quantity' => 1, 'price' => 500.00],
            ['order_id' => 4, 'product_id' => 4, 'quantity' => 2, 'price' => 15.00],
            ['order_id' => 5, 'product_id' => 5, 'quantity' => 1, 'price' => 40.00],
            ['order_id' => 6, 'product_id' => 6, 'quantity' => 3, 'price' => 25.00]
        ];

        foreach ($orderItems as $item) {
            OrderItem::create($item);
        }
    }
}

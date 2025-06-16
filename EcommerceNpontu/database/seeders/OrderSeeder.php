<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $orders = [
            ['user_id' => 1, 'total' => 1040.00, 'status' => 'paid', 'shipping_address' => '123 Main St'],
            ['user_id' => 2, 'total' => 60.00, 'status' => 'pending', 'shipping_address' => '42 Elm St'],
            ['user_id' => 3, 'total' => 500.00, 'status' => 'paid', 'shipping_address' => '78 Maple Ave'],
            ['user_id' => 4, 'total' => 40.00, 'status' => 'pending', 'shipping_address' => '9 South Rd'],
            ['user_id' => 5, 'total' => 25.00, 'status' => 'paid', 'shipping_address' => '55 Market St'],
            ['user_id' => 6, 'total' => 75.00, 'status' => 'pending', 'shipping_address' => '2 River Rd']
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}

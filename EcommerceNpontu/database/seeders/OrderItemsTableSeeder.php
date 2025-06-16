<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_items')->insert([
            ['order_id' => 1, 'product_id' => 1, 'quantity' => 2, 'price' => 500.00, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => 2, 'product_id' => 3, 'quantity' => 3, 'price' => 20.00, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => 3, 'product_id' => 2, 'quantity' => 1, 'price' => 500.00, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => 4, 'product_id' => 4, 'quantity' => 2, 'price' => 15.00, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => 5, 'product_id' => 5, 'quantity' => 1, 'price' => 40.00, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => 6, 'product_id' => 6, 'quantity' => 3, 'price' => 25.00, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

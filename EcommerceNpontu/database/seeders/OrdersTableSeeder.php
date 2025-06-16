<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            ['user_id' => 1, 'total' => 1040.00, 'status' => 'paid', 'shipping_address' => '123 Main St', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'total' => 60.00, 'status' => 'pending', 'shipping_address' => '42 Elm St', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'total' => 500.00, 'status' => 'paid', 'shipping_address' => '78 Maple Ave', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 4, 'total' => 40.00, 'status' => 'pending', 'shipping_address' => '9 South Rd', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 5, 'total' => 25.00, 'status' => 'paid', 'shipping_address' => '55 Market St', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 6, 'total' => 75.00, 'status' => 'pending', 'shipping_address' => '2 River Rd', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

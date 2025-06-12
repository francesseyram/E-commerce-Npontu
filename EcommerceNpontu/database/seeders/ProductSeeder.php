<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Wireless Mouse',
            'category' => 'Electronics',
            'price' => 49.99,
        ]);

        Product::create([
            'name' => 'Bluetooth Headphones',
            'category' => 'Audio',
            'price' => 89.99,
        ]);

        Product::create([
            'name' => 'USB-C Cable',
            'category' => 'Accessories',
            'price' => 9.99,
        ]);
    }
}

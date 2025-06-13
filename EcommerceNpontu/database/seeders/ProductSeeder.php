<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $electronics = Category::firstOrCreate(
            ['name' => 'Electronics'],
            ['slug' => 'electronics']
        );

        $audio = Category::firstOrCreate(
            ['name' => 'Audio'],
            ['slug' => 'audio']
        );

        $accessories = Category::firstOrCreate(
            ['name' => 'Accessories'],
            ['slug' => 'accessories']
        );

        Product::create([
            'name' => 'Wireless Mouse',
            'slug' => 'wireless-mouse',
            'price' => 49.99,
            'category_id' => $electronics->id,
        ]);

        Product::create([
            'name' => 'Bluetooth Headphones',
            'slug' => 'bluetooth-headphones',
            'price' => 89.99,
            'category_id' => $audio->id,
        ]);

        Product::create([
            'name' => 'USB-C Cable',
            'slug' => 'usb-c-cable',
            'price' => 9.99,
            'category_id' => $accessories->id,
        ]);

        Product::create([
            'name' => 'Smartphone Stand',
            'slug' => 'smartphone-stand',
            'price' => 19.99,
            'category_id' => $accessories->id,
        ]);
        Product::create([
            'name' => 'Gaming Mouse Pad',
            'slug' => 'gaming-mouse-pad',
            'price' => 29.99,
            'category_id' => $accessories->id,
        ]);
        Product::create([
            'name' => 'Portable Charger',
            'slug' => 'portable-charger',
            'price' => 39.99,
            'category_id' => $accessories->id,
        ]);
        Product::create([
            'name' => 'Wireless Keyboard',
            'slug' => 'wireless-keyboard',
            'price' => 59.99,
            'category_id' => $electronics->id,
        ]);
        Product::create([
            'name' => 'Noise-Cancelling Headphones',
            'slug' => 'noise-cancelling-headphones',
            'price' => 199.99,
            'category_id' => $audio->id,
        ]);
        Product::create([
            'name' => 'HDMI Cable',
            'slug' => 'hdmi-cable',
            'price' => 14.99,
            'category_id' => $accessories->id,
        ]);
        Product::create([
            'name' => 'Smartwatch',
            'slug' => 'smartwatch',
            'price' => 249.99,
            'category_id' => $electronics->id,
        ]);
        Product::create([
            'name' => 'Bluetooth Speaker',
            'slug' => 'bluetooth-speaker',
            'price' => 79.99,
            'category_id' => $audio->id,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['category_id' => 1, 'name' => 'Smartphone', 'slug' => 'smartphone', 'description' => 'A powerful phone', 'price' => 500.00, 'stock' => 10, 'image' => 'smartphone.jpg'],
            ['category_id' => 1, 'name' => 'Tablet', 'slug' => 'tablet', 'description' => 'A lightweight and handy gadget', 'price' => 300.00, 'stock' => 15, 'image' => 'tablet.jpg'],
            ['category_id' => 2, 'name' => 'T-shirt', 'slug' => 't-shirt', 'description' => 'Comfortable cotton T-shirt', 'price' => 20.00, 'stock' => 50, 'image' => 'tshirt.jpg'],
            ['category_id' => 3, 'name' => 'Book A', 'slug' => 'book-a', 'description' => 'Bestseller novel', 'price' => 15.00, 'stock' => 100, 'image' => 'book.jpg'],
            ['category_id' => 4, 'name' => 'Blender', 'slug' => 'blender', 'description' => 'Kitchen blender', 'price' => 40.00, 'stock' => 30, 'image' => 'blender.jpg'],
            ['category_id' => 5, 'name' => 'Dumbbell', 'slug' => 'dumbbell', 'description' => 'Fitness equipment 5kg', 'price' => 25.00, 'stock' => 20, 'image' => 'dumbbell.jpg']
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

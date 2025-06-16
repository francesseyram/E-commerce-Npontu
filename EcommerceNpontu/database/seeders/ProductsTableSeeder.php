<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'name' => 'Smartphone',
                'slug' => 'smartphone',
                'description' => 'A powerful phone',
                'price' => 500.00,
                'stock' => 10,
                'image' => 'smartphone.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'name' => 'Tablet',
                'slug' => 'tablet',
                'description' => 'A lightweight and handy gadget',
                'price' => 300.00,
                'stock' => 15,
                'image' => 'tablet.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'T-shirt',
                'slug' => 't-shirt',
                'description' => 'Comfortable cotton T-shirt',
                'price' => 20.00,
                'stock' => 50,
                'image' => 'tshirt.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'name' => 'Book A',
                'slug' => 'book-a',
                'description' => 'Bestseller novel',
                'price' => 15.00,
                'stock' => 100,
                'image' => 'book.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'name' => 'Blender',
                'slug' => 'blender',
                'description' => 'Kitchen blender',
                'price' => 40.00,
                'stock' => 30,
                'image' => 'blender.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 5,
                'name' => 'Dumbbell',
                'slug' => 'dumbbell',
                'description' => 'Fitness equipment 5kg',
                'price' => 25.00,
                'stock' => 20,
                'image' => 'dumbbell.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

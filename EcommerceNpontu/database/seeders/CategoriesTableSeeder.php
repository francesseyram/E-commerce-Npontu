<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Electronics', 'slug' => 'electronics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Clothing', 'slug' => 'clothing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Books', 'slug' => 'books', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Home Appliances', 'slug' => 'home-appliances', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Toys', 'slug' => 'toys', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fitness', 'slug' => 'fitness', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

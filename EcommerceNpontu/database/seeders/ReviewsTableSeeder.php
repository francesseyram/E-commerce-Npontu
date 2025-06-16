<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            ['user_id' => 1, 'product_id' => 1, 'rating' => 5, 'comment' => 'Excellent phone!', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'product_id' => 2, 'rating' => 4, 'comment' => 'Very handy', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'product_id' => 3, 'rating' => 3, 'comment' => 'Comfortable but not perfect', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 4, 'product_id' => 4, 'rating' => 5, 'comment' => 'Love this book', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 5, 'product_id' => 5, 'rating' => 4, 'comment' => 'Good blender', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 6, 'product_id' => 6, 'rating' => 5, 'comment' => 'Fitness made easy', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

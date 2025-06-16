<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            ['user_id' => 1, 'product_id' => 1, 'rating' => 5, 'comment' => 'Excellent phone!'],
            ['user_id' => 2, 'product_id' => 2, 'rating' => 4, 'comment' => 'Very handy'],
            ['user_id' => 3, 'product_id' => 3, 'rating' => 3, 'comment' => 'Comfortable but not perfect'],
            ['user_id' => 4, 'product_id' => 4, 'rating' => 5, 'comment' => 'Love this book'],
            ['user_id' => 5, 'product_id' => 5, 'rating' => 4, 'comment' => 'Good blender'],
            ['user_id' => 6, 'product_id' => 6, 'rating' => 5, 'comment' => 'Fitness made easy']
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}

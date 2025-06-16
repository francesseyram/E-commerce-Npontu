<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Alice',
                'email' => 'alice@example.com',
                'password' => Hash::make('hashed_pass'),
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob',
                'email' => 'bob@example.com',
                'password' => Hash::make('hashed_pass'),
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Charlie',
                'email' => 'charlie@example.com',
                'password' => Hash::make('hashed_pass'),
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Diana',
                'email' => 'diana@example.com',
                'password' => Hash::make('hashed_pass'),
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Evan',
                'email' => 'evan@example.com',
                'password' => Hash::make('hashed_pass'),
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Frank',
                'email' => 'frank@example.com',
                'password' => Hash::make('hashed_pass'),
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

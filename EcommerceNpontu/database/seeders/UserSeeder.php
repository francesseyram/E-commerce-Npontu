<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Alice', 'email' => 'alice@example.com', 'password' => Hash::make('password'), 'is_admin' => true],
            ['name' => 'Bob', 'email' => 'bob@example.com', 'password' => Hash::make('password'), 'is_admin' => false],
            ['name' => 'Charlie', 'email' => 'charlie@example.com', 'password' => Hash::make('password'), 'is_admin' => false],
            ['name' => 'Diana', 'email' => 'diana@example.com', 'password' => Hash::make('password'), 'is_admin' => false],
            ['name' => 'Evan', 'email' => 'evan@example.com', 'password' => Hash::make('password'), 'is_admin' => false],
            ['name' => 'Frank', 'email' => 'frank@example.com', 'password' => Hash::make('password'), 'is_admin' => true],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

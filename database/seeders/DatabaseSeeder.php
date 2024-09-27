<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'user_type' => 1,
            'name' => 'Al Hassan',
            'email' => 'admin@gmail.com',
            'phone' => '01710410490',
            'password' => '$2y$12$VMMWU0ZzGvfKkA22GD4WfOpIfcjpdYfz7grrQoJhLIXizCqHmndGy',
            'status' => 1,
        ]);
    }
}

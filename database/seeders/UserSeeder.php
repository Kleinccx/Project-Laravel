<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(), // Assuming email is verified immediately upon creation
            'password' => Hash::make('password'),
            'mobile_number' => '1234567890',
            'address' => 'Admin Address',
            'status' => 'active', // Set status to active
        ]);

        // Create a regular user
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'email_verified_at' => now(), // Assuming email is verified immediately upon creation
            'password' => Hash::make('password'),
            'mobile_number' => '9876543210',
            'address' => 'User Address',
            'status' => 'active', // Set status to active
        ]);

        // Add more user data as needed
    }
}
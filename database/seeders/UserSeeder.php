<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@demo.com',
            'password' => Hash::make('123456789'),
            'contact' => '1234567890',
            'gender' => 'male',
            'dob' => '1990-01-01',
            'education' => 'Masters in Administration',
            'gems' => 1000,
            'role' => 'admin',
        ]);

        // Instructor User
        User::create([
            'name' => 'Instructor User',
            'email' => 'instructor@demo.com',
            'password' => Hash::make('123456789'),
            'contact' => '9876543210',
            'gender' => 'female',
            'dob' => '1985-05-15',
            'education' => 'PhD in Education',
            'gems' => 500,
            'role' => 'instructor',
        ]);

        // Student User
        User::create([
            'name' => 'Student User',
            'email' => 'student@demo.com',
            'password' => Hash::make('123456789'),
            'contact' => '5555555555',
            'gender' => 'male',
            'dob' => '2000-03-20',
            'education' => 'High School',
            'gems' => 100,
            'role' => 'student',
        ]);
    }
}

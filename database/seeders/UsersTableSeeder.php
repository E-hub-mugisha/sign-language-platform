<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'is_active' => true,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Teacher John',
                'email' => 'teacher.john@example.com',
                'password' => Hash::make('password123'),
                'role' => 'teacher',
                'is_active' => true,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Teacher Alice',
                'email' => 'teacher.alice@example.com',
                'password' => Hash::make('password123'),
                'role' => 'teacher',
                'is_active' => true,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Student Eric',
                'email' => 'student.eric@example.com',
                'password' => Hash::make('password123'),
                'role' => 'student',
                'is_active' => true,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Student Jane',
                'email' => 'student.jane@example.com',
                'password' => Hash::make('password123'),
                'role' => 'student',
                'is_active' => false, // not yet approved
                'email_verified_at' => null,
            ],
            [
                'name' => 'Parent Michael',
                'email' => 'parent.michael@example.com',
                'password' => Hash::make('password123'),
                'role' => 'parent',
                'is_active' => true,
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

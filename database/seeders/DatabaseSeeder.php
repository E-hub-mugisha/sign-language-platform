<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            LessonCategoriesSeeder::class,
            LessonSeeder::class,
            LessonProgressSeeder::class,
            UserBadgeSeeder::class,
            QuizScoreSeeder::class,
        ]);
    }
}

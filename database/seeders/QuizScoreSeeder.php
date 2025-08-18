<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuizScore;
use App\Models\User;
use App\Models\Lesson;
use App\Models\QuizAttempts;

class QuizScoreSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $lessons = Lesson::all();

        foreach ($users as $user) {
            foreach ($lessons->random(2) as $lesson) {
                QuizAttempts::create([
                    'user_id' => $user->id,
                    'lesson_id' => $lesson->id,
                    'score' => fake()->numberBetween(40, 100),
                    'passed' => fake()->boolean(75), // 75% chance of passing
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LessonProgress;
use App\Models\User;
use App\Models\Lesson;

class LessonProgressSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $lessons = Lesson::all();

        foreach ($users as $user) {
            foreach ($lessons->random(3) as $lesson) {
                LessonProgress::create([
                    'user_id' => $user->id,
                    'lesson_id' => $lesson->id,
                    'status' => fake()->randomElement(['in-progress', 'completed']),
                    'progress_percentage' => fake()->numberBetween(20, 100),
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\LessonReview;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessons = Lesson::all();
        $users = User::all();

        foreach ($lessons as $lesson) {
            foreach ($users->random(3) as $user) { // 3 random reviews per lesson
                LessonReview::create([
                    'lesson_id' => $lesson->id,
                    'user_id' => $user->id,
                    'rating' => rand(3, 5),
                    'comment' => fake()->sentence(),
                ]);
            }
        }
    }
}

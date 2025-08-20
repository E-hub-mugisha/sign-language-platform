<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EducationTip;
use App\Models\User;
use App\Models\LessonCategory;

class EducationTipSeeder extends Seeder
{
    public function run()
    {
        // Get a user and category to assign tips to
        $categories = LessonCategory::all();
        if ($categories->isEmpty()) {
            $categories = LessonCategory::factory(3)->create();
        }

        $tips = [
            [
                'title' => 'Effective Study Habits',
                'description' => 'Learn how to structure your study sessions for maximum retention.',
                'image' => null,
                'user_id' => 1,
                'category_id' => $categories->random()->id,
                'is_active' => true,
                'views' => 10,
                'slug' => 'effective-study-habits',
                'tag' => 'study, learning',
            ],
            [
                'title' => 'Time Management Tips',
                'description' => 'Tips to manage your time efficiently and avoid procrastination.',
                'image' => null,
                'user_id' => 1,
                'category_id' => $categories->random()->id,
                'is_active' => true,
                'views' => 8,
                'slug' => 'time-management-tips',
                'tag' => 'time, productivity',
            ],
            [
                'title' => 'Memory Improvement Techniques',
                'description' => 'Simple exercises to improve memory retention and recall.',
                'image' => null,
                'user_id' => 1,
                'category_id' => $categories->random()->id,
                'is_active' => true,
                'views' => 15,
                'slug' => 'memory-improvement-techniques',
                'tag' => 'memory, brain',
            ],
            [
                'title' => 'Active Learning Strategies',
                'description' => 'Engage actively with materials to boost comprehension.',
                'image' => null,
                'user_id' => 1,
                'category_id' => $categories->random()->id,
                'is_active' => true,
                'views' => 12,
                'slug' => 'active-learning-strategies',
                'tag' => 'learning, engagement',
            ],
            [
                'title' => 'Note-Taking Tips',
                'description' => 'Effective ways to take notes during lectures or reading.',
                'image' => null,
                'user_id' => 1,
                'category_id' => $categories->random()->id,
                'is_active' => true,
                'views' => 7,
                'slug' => 'note-taking-tips',
                'tag' => 'notes, study',
            ],
            [
                'title' => 'Overcoming Exam Anxiety',
                'description' => 'Techniques to stay calm and focused during exams.',
                'image' => null,
                'user_id' => 1,
                'category_id' => $categories->random()->id,
                'is_active' => true,
                'views' => 9,
                'slug' => 'overcoming-exam-anxiety',
                'tag' => 'exam, stress, tips',
            ],
        ];

        foreach ($tips as $tip) {
            EducationTip::create($tip);
        }
    }
}

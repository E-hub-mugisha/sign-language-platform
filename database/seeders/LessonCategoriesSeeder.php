<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Greetings'],
            ['name' => 'Numbers'],
            ['name' => 'Daily Phrases'],
            ['name' => 'Food & Drinks'],
            ['name' => 'Family'],
            ['name' => 'Travel'],
            ['name' => 'School'],
            ['name' => 'Workplace'],
            ['name' => 'Shopping'],
        ];

        DB::table('lesson_categories')->insert($categories);
    }
}

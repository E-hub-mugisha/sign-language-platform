<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\User;
use App\Models\LessonCategory;

class LessonSeeder extends Seeder
{
    public function run(): void
    {
        $tutor1 = User::where('email', 'teacher.alice@example.com')->first();
        $tutor2 = User::where('email', 'teacher.john@example.com')->first();

        $greetings = LessonCategory::where('name', 'Greetings')->first();
        $numbers   = LessonCategory::where('name', 'Numbers')->first();
        $phrases   = LessonCategory::where('name', 'Daily Phrases')->first();

        Lesson::insert([
            [
                'title' => 'Basic Greetings in English',
                'description' => 'Learn how to say hello, good morning, good evening, and goodbye.',
                'language' => 'English',
                'category_id' => $greetings->id ?? null,
                'video_url' => 'https://example.com/videos/greetings_en.mp4',
                'thumbnail_url' => 'https://example.com/thumbnails/greetings_en.jpg',
                'pdf_url' => 'https://example.com/pdfs/greetings_en.pdf',
                'is_active' => true,
                'tutor_id' => $tutor1?->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ikaze no Kubaza Amakuru (Greetings in Kinyarwanda)',
                'description' => 'Learn common greetings like "Muraho", "Mwiriwe", and how to ask "Amakuru?".',
                'language' => 'Kinyarwanda',
                'category_id' => $greetings->id ?? null,
                'video_url' => 'https://example.com/videos/greetings_rw.mp4',
                'thumbnail_url' => 'https://example.com/thumbnails/greetings_rw.jpg',
                'pdf_url' => null,
                'is_active' => true,
                'tutor_id' => $tutor2?->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Counting Numbers in English',
                'description' => 'Learn how to count from 1 to 20 in English.',
                'language' => 'English',
                'category_id' => $numbers->id ?? null,
                'video_url' => 'https://example.com/videos/numbers_en.mp4',
                'thumbnail_url' => 'https://example.com/thumbnails/numbers_en.jpg',
                'pdf_url' => 'https://example.com/pdfs/numbers_en.pdf',
                'is_active' => true,
                'tutor_id' => $tutor1?->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kubara Mu Kinyarwanda',
                'description' => 'Learn how to count from 1 to 20 in Kinyarwanda.',
                'language' => 'Kinyarwanda',
                'category_id' => $numbers->id ?? null,
                'video_url' => 'https://example.com/videos/numbers_rw.mp4',
                'thumbnail_url' => 'https://example.com/thumbnails/numbers_rw.jpg',
                'pdf_url' => null,
                'is_active' => true,
                'tutor_id' => $tutor2?->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Daily Phrases in English',
                'description' => 'Learn useful daily expressions such as asking for directions, shopping, and introductions.',
                'language' => 'English',
                'category_id' => $phrases->id ?? null,
                'video_url' => 'https://example.com/videos/phrases_en.mp4',
                'thumbnail_url' => 'https://example.com/thumbnails/phrases_en.jpg',
                'pdf_url' => null,
                'is_active' => true,
                'tutor_id' => $tutor1?->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Imvugo Zimenyerewe Mu Buzima Bwa Buri Munsi',
                'description' => 'Learn common daily Kinyarwanda phrases for greetings, markets, and travel.',
                'language' => 'Kinyarwanda',
                'category_id' => $phrases->id ?? null,
                'video_url' => 'https://example.com/videos/phrases_rw.mp4',
                'thumbnail_url' => 'https://example.com/thumbnails/phrases_rw.jpg',
                'pdf_url' => 'https://example.com/pdfs/phrases_rw.pdf',
                'is_active' => true,
                'tutor_id' => $tutor2?->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

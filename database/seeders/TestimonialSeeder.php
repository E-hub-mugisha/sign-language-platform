<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('testimonials')->insert([
            [
                'name' => 'Alice Uwase',
                'role' => 'Student',
                'photo' => 'photos/testimonials/alice.jpg',
                'message' => 'This platform has completely transformed the way I learn. The tutors are supportive and the lessons are engaging!',
                'rating' => 5,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jean Claude',
                'role' => 'Parent',
                'photo' => 'photos/testimonials/jean.jpg',
                'message' => 'As a parent, I am very satisfied. My child enjoys learning and I can see real progress in their confidence.',
                'rating' => 4,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maria Niyonsaba',
                'role' => 'Student',
                'photo' => 'photos/testimonials/maria.jpg',
                'message' => 'I love the flexibility of learning at my own pace. The resources provided are very helpful.',
                'rating' => 5,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'David Habimana',
                'role' => 'Student',
                'photo' => 'photos/testimonials/david.jpg',
                'message' => 'The video lessons are clear and easy to follow. The tutors explain concepts in a way that makes learning fun.',
                'rating' => 4,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grace Mukamana',
                'role' => 'Parent',
                'photo' => 'photos/testimonials/grace.jpg',
                'message' => 'Great platform! I recommend it to other parents looking for quality learning for their children.',
                'rating' => 5,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eric Mugisha',
                'role' => 'Student',
                'photo' => 'photos/testimonials/eric.jpg',
                'message' => 'This has been a game changer for me. I can learn anytime, anywhere, and keep track of my progress.',
                'rating' => 5,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

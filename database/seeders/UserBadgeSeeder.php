<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserBadge;
use App\Models\User;

class UserBadgeSeeder extends Seeder
{
    public function run()
    {
        $badges = [
            ['name' => 'Beginner', 'description' => 'Completed your first lesson'],
            ['name' => 'Fast Learner', 'description' => 'Completed 5 lessons'],
            ['name' => 'Dedicated', 'description' => 'Logged in 7 days in a row'],
            ['name' => 'Quiz Master', 'description' => 'Scored above 90% in a quiz'],
            ['name' => 'Helper', 'description' => 'Helped another student in discussion'],
        ];

        $users = User::all();

        foreach ($users as $user) {
            foreach (fake()->randomElements($badges, 2) as $badge) {
                UserBadge::create([
                    'user_id' => $user->id,
                    'badge_name' => $badge['name'],
                    'badge_description' => $badge['description'],
                ]);
            }
        }
    }
}

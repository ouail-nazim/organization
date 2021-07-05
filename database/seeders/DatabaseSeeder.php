<?php

namespace Database\Seeders;

use App\Models\App_setting;
use App\Models\Message;
use App\Models\Slides;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        Message::factory(10)->create();
        $this->call([
            AppSeeder::class,
            GoalSeeder::class,
            GradeSeeder::class,
            MemberSeeder::class,
            NewsSeeder::class,
            MeetingsSeeder::class,
        ]);
        Slides::create(["cover" => '/images/0.jpg']);
        Slides::create(["cover" => '/images/1.jpeg']);
        Slides::create(["cover" => '/images/2.png']);
    }
}

<?php

namespace Database\Seeders;

use App\Models\App_setting;
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
        $this->call([
            AppSeeder::class,
            GoalSeeder::class,
            GradeSeeder::class,
            MemberSeeder::class,
        ]);
    }
}

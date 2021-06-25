<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::create(["grade" => "boss"]);
        Grade::create(["grade" => "superuser"]);
        Grade::create(["grade" => "user"]);
    }
}

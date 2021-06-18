<?php

namespace Database\Seeders;

use App\Models\App_setting;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App_setting::create(["key" => "app_name", "value" => "Organization"]);
        App_setting::create(["key" => "language", "value" => "ar"]);
        App_setting::create(["key" => "app_version", "value" => "1.0.0"]);
        App_setting::create(["key" => "main_color", "value" => "#DC143C"]);
        App_setting::create(["key" => "secondary_color", "value" => "#32CD32"]);
    }
}

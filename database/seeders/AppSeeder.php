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
        App_setting::create(["key" => "logo_cover", "value" => "https://www.pngitem.com/pimgs/m/241-2413983_corsair-logo-png-white-transparent-png.png"]);
        App_setting::create(["key" => "address", "value" => "Company Inc, 3 Abbey Road, San Francisco CA 94102"]);
        App_setting::create(["key" => "email", "value" => "wailnazim28@gmail.com"]);
        App_setting::create(["key" => "phone", "value" => "031909393"]);
    }
}

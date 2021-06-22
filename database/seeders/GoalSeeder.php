<?php

namespace Database\Seeders;

use App\Models\Goals;
use Illuminate\Database\Seeder;

class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Goals::create(
            [
                "description" => "قد ترغب أحيانًا في إيقاف تشغيل قواعد التحقق من الصحة على إحدى السمات بعد فشل التحقق الأول. لنفعل ذلك",
                "lang" => "ar"
            ]
        );
        Goals::create(
            [
                "description" => "Sometimes you may wish to stop running validation rules on an attribute after the first validation failure. To do so",
                "lang" => "en"
            ]
        );
    }
}

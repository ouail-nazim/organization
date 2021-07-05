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
        App_setting::create(["key" => "logo_cover", "value" => "https://seeklogo.com/images/I/international-maritime-organization-logo-D75A5F13A1-seeklogo.com.png"]);
        App_setting::create(["key" => "boss_avatar", "value" => "/images/avatar.svg"]);
        App_setting::create(["key" => "app_name", "value" => "الجمعية الوطنية لخط اول نوفمبر"]);
        App_setting::create(["key" => "app_name_ar", "value" => "الجمعية الوطنية لخط اول نوفمبر"]);
        App_setting::create(["key" => "app_name_en", "value" => "1nv org"]);
        App_setting::create(["key" => "app_name_abrv", "value" => "PALCN"]);
        App_setting::create(["key" => "language", "value" => "ar"]);
        App_setting::create(["key" => "app_version", "value" => "1.0.0"]);
        App_setting::create(["key" => "main_color", "value" => "#DC143C"]);
        App_setting::create(["key" => "secondary_color", "value" => "#32CD32"]);
        App_setting::create(["key" => "address", "value" => "Company Inc, 3 Abbey Road, San Francisco CA 94102"]);
        App_setting::create(["key" => "email", "value" => "testmail1@gmail.com"]);
        App_setting::create(["key" => "phone", "value" => "031909393"]);
        App_setting::create(["key" => "mobile", "value" => "0750509483"]);
        App_setting::create(["key" => "facebook", "value" => "#facebook"]);
        App_setting::create(["key" => "intagram", "value" => "#intagram"]);
        App_setting::create(["key" => "twitter", "value" => "#twitter"]);
        App_setting::create(["key" => "whatsapp", "value" => "#whatsapp"]);
        App_setting::create(["key" => "home_page_video_src", "value" => "https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Fdjamelrezzaghebla%2Fvideos%2F157939163016572%2F&show_text=false&width=560&t=0"]);
        App_setting::create(["key" => "home_page_word_head", "value" => "الدكتور سعيد بن عبدالله القحطاني رئيساً لمجلس إدارة الجمعية"]);
        App_setting::create(["key" => "home_page_word_content", "value" => "إننا نفخر بإرثنا الثقافي والتاريخي السعودي والعربي والإسلامي، وندرك أهمية المحافظة عليه لتعزيز الوحدة الوطنية وترسيخ القيم العربية والإسلامية الأصيلة. إن أرضنا عُرفت -على مرّ التاريخ- بحضاراتها العريقة وطرقها التجارية التي ربطت حضارات العالم بعضها ببعض، مما أكسبها تنوعاً وعمقاً ثقافياً فريداً. ولذلك، سنحافظ على هويتنا الوطنية ونبرزها ونعرّف بها، وننقلها إلى أجيالنا القادمة، وذلك من خلال غرس المبادئ والقيم الوطنية"]);
    }
}

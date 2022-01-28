<?php
namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::truncate();
        $options = [
            'site_name' => ['value' => 'Fin Việt Nam', 'type' => ''],
            'site_description' => ['value' => '', 'type' => ''],
            'admin_email' => ['value' => 'info@emera.vn', 'type' => ''],
            'hotline' => ['value' => '024 2346 1889', 'type' => ''],
            'shop_list_url' => ['value' => '', 'type' => ''],
            'facebook_url' => ['value' => 'https://www.facebook.com/laptrinhchonguoimoibatdau/', 'type' => ''],
            'youtube_url' => ['value' => 'https://www.youtube.com/','type' => '', ],
            'twitter_url' => ['value' => 'https://twitter.com/home', 'type' => ''],
            'instagram_url' => ['value' => 'https://www.instagram.com/', 'type' => ''],
            'pinterest_url' => ['value' => 'https://www.pinterest.com/', 'type' => ''],
            'linkedin_url' => ['value' => 'https://www.linkedin.com/', 'type' => ''],
            'map_url' => ['value' => 'https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d3833.9703622287407!2d108.21804440000004!3d16.067027700000132!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zQW5oIMSQ4bupYyBEaWdpdGFs!5e0!3m2!1svi!2s!4v1632365783325!5m2!1svi!2s', 'type' => ''],
            'phone_company' => ['value' => '024 2346 1889', 'type' => ''],
            'address_company' => [
                'value' => 'Tòa nhà văn phòng số 57 Vũ Trọng Phụng,P. Thanh Xuân Trung, Thanh Xuân, Hà Nội',
                'type' => '',
            ],
            'robots' => ['value' => 'noindex, nofollow', 'type' => ''],
            'footer' => ['value' => '', 'type' => 'textarea'],
            'header' => ['value' => '', 'type' => 'textarea'],
            'messenger' => ['value' => 'https://www.messenger.com/t/laptrinhchonguoimoibatdau', 'type' => ''],
            'zalo' => ['value' => '024 2346 1889', 'type' => ''],
            'seo_schema' => ['value' => '', 'type' => 'textarea'],
            'cart_successfull' => ['value' => '', 'type' => 'textarea'],
            'is_popup' => ['value' => '', 'type' => 'checkbox'],
            'popup' => ['value' => '', 'type' => 'textarea'],
            'popup_start' => ['value' => '', 'type' => ''],
            'popup_time' => ['value' => '', 'type' => ''],
            'captcha_secret' => ['value' => '', 'type' => ''],
            'captcha_sitekey' => ['value' => '', 'type' => ''],
            'dmca' => ['value' => '', 'type' => 'textarea'],
            'description_footer' => ['value' => 'Of course they don’t want us to eat our breakfast, so we are going to enjoy our breakfast. Learning is cool, but knowing is better, and I know the key to success Of course they don’t want us to eat our breakfast, so we are going to ....', 'type' => 'textarea'],
            'logo' => ['value' => '', 'type' => 'upload'],
            'logo_footer' => ['value' => '', 'type' => 'upload'],
        ];

        foreach ($options as $name => $row) {
            if (!Option::where('option_name', '=', $name)->exists()) {
                Option::create(
                    [
                    'option_name' => $name,
                    'option_value' => $row["value"],
                    'option_type' => $row["type"],
                    ]
                );
            }
        }
    }
}

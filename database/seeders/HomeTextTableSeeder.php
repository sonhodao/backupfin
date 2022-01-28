<?php

namespace Database\Seeders;

use App\Models\HomeText;
use Illuminate\Database\Seeder;

class HomeTextTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeText::truncate();
        $homeTexts = [
            'title_home' => ['value' => 'Chuyên trang đầu tiên dành cho nhà đầu tư mới', 'type' => ''],
            'text_1' => ['value' => 'Vì một môi trường đầu tư công bằng, minh bạch và an toàn cho người dân Việt Nam, Finvn cam kết cung cấp miễn phí kiến thức về đầu tư chứng khoán, kinh nghiệm thực tế của chuyên gia và những thông tin xác thực, minh bạch nhất trên thị trường', 'type' => ''],
            'text_2' => ['value' => 'Ban đang tìm kiếm thông tin về', 'type' => ''],

            'text_k1' => ['value' => 'SMART TRAVEL MOVES', 'type' => ''],
            'title_k1' => ['value' => 'Earn travel rewards now for that trip you know you’ll want to take later', 'type' => ''],
            'text_but_k1' => ['value' => 'POINT THE WAY', 'type' => ''],
            'link_k1' => ['value' => 'https://finvn.vn/', 'type' => ''],
            'color_k1' => ['value' => '#005FB9', 'type' => 'color'],
            'isHome_k1' => ['value' => 1, 'type' => 'checkbox'],

            'text_k2' => ['value' => 'MAKE A MOVE', 'type' => ''],
            'title_k2' => ['value' => 'Dreaming of moving to a place with a bit more space?', 'type' => ''],
            'text_but_k2' => ['value' => 'MOVING ON OUT', 'type' => ''],
            'link_k2' => ['value' => 'https://finvn.vn/', 'type' => ''],
            'color_k2' => ['value' => '#E3FAF2', 'type' => 'color'],
            'isHome_k2' => ['value' => 1, 'type' => 'checkbox'],

            'text_k3' => ['value' => 'INVEST IN FUTURE YOU', 'type' => ''],
            'title_k3' => ['value' => 'Considering a financial advisor? See our highest rated options and find the right fit for you and your money.', 'type' => ''],
            'text_but_k3' => ['value' => 'SEE TOP ADVISORS', 'type' => ''],
            'link_k3' => ['value' => 'https://finvn.vn/', 'type' => ''],
            'color_k3' => ['value' => '#4C99E6', 'type' => 'color'],
            'isHome_k3' => ['value' => 1, 'type' => 'checkbox'],

            'text_k4' => ['value' => 'WORTH A LISTEN', 'type' => ''],
            'title_k4' => ['value' => 'Have a money goal? Turn to our SmartMoney podcast for hacks, how-tos and more.', 'type' => ''],
            'text_but_k4' => ['value' => 'TUNE IN', 'type' => ''],
            'link_k4' => ['value' => 'https://finvn.vn/', 'type' => ''],
            'color_k4' => ['value' => '#F5F5F5', 'type' => 'color'],
            'isHome_k4' => ['value' => 1, 'type' => 'checkbox'],

            'text_k5' => ['value' => 'LET’S GET AWAY', 'type' => ''],
            'title_k5' => ['value' => 'Ready for an adventure beyond your backyard? Find the smartest travel rewards card for you.', 'type' => ''],
            'text_but_k5' => ['value' => 'ADVENTURE CALLS', 'type' => ''],
            'link_k5' => ['value' => 'https://finvn.vn/', 'type' => ''],
            'color_k5' => ['value' => '#E3FAF2', 'type' => 'color'],
            'isHome_k5' => ['value' => 1, 'type' => 'checkbox'],

            'text_k6' => ['value' => 'GAME ON', 'type' => ''],
            'title_k6' => ['value' => 'Love having the latest sports gear? These credit cards offer special rewards, extra perks, and discounts too.', 'type' => ''],
            'text_but_k6' => ['value' => 'SEE TOP CARDS', 'type' => ''],
            'link_k6' => ['value' => 'https://finvn.vn/', 'type' => ''],
            'color_k6' => ['value' => '#4C99E6', 'type' => 'color'],
            'isHome_k6' => ['value' => 1, 'type' => 'checkbox'],

            'text_k7' => ['value' => 'Ở ĐÂY', 'type' => ''],
            'title_k7_1' => ['value' => 'Mọi thứ bạn cần - đều miễn phí', 'type' => ''],
            'title_k7_2' => ['value' => 'Kiến thức đầu tư', 'type' => ''],
            'text_k7_21' => ['value' => 'Chúng tôi biến những kiến thức đầu tư tài chính phức tạp thành những bài học ngắn gọn, dễ hiểu', 'type' => ''],
            'title_k7_3' => ['value' => 'Kinh nghiệm chuyên gia', 'type' => ''],
            'text_k7_31' => ['value' => 'Đội ngũ chuyên gia chứng khoán lâu năm trong nghề của chúng tôi sẽ giúp bạn có những lời khuyên chân thực, hiệu quả', 'type' => ''],
            'title_k7_4' => ['value' => 'Công cụ tài chính', 'type' => ''],
            'text_k7_41' => ['value' => 'Một công cụ hỗ trợ việc so sánh các chỉ số trên thị trường để giúp bạn đưa ra các quyết định đầu tư nhanh chóng và đơn giản hơn', 'type' => ''],

            'image' => ['value' => 'https://images.finvn.vn/homepage/nw-hp-rtb-destkop-1.jpg', 'type' => 'upload'],


        ];

        foreach ($homeTexts as $name => $row) {
            if (!HomeText::where('text_name', '=', $name)->exists()) {
                HomeText::create(
                    [
                    'text_name' => $name,
                    'text_value' => $row["value"],
                    'text_type' => $row["type"],
                    ]
                );
            }
        }
    }
}

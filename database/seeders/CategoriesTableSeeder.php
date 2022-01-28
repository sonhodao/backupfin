<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{

        /**
         * Run the database seeds.
         *
         * @return void
         */
    public function run(): void
    {
        \DB::table('categories')->delete();

        $categories = [
                'Tin tức|1' => [
                    'Tin nổi bật|1'=> [
                        'Tin doanh nghiệp|1',
                        'Tin mua - bán/ phát hành|1',
                        'Cổ tức|1',
                        'Chuyển động thị trường|1',
                        'Chứng khoán/tài chính|1',
                        'Tin trong nước|1',
                        'Tin thế giới|1',
                        'Vàng/ Crypto/ Hàng hóa|1',
                    ],
                    'Góc nhìn chuyên gia|1',
                    'Hiểu chính sách|1'
                ],
                'Dành cho nhà đầu tư mới|1' => [
                    'Kiến thức|1',
                    'Thuật ngữ chứng khoán|1',
                    'Lời khuyên của chuyên gia|1'
                ],
                'Doanh nghiệp|1' => [
                    'Công cụ so sánh|1' => [
                        'So sánh doanh nghiệp|1',
                        'So sánh ngành|1',
                    ],
                    'Tin doanh nghiệp|1' => [
                        'Báo cáo phân tích doanh nghiệp|1',
                        'Giới thiệu doanh nghiệp|1',
                    ],

                ],
        ];

        foreach ($categories as $category => $children) {
            [$categoryName, $categoryType] = explode('|', $category);

            $newCategory = Category::create(
                [
                'title' => ucfirst($categoryName),
                'slug' => Str::slug($categoryName),
                'thumbnail' => '/preview-icon.png',
                'is_menu_bottom' => true,
                ]
            );

            foreach ($children as $child => $childrenOfChild) {
                if (is_numeric($child)) {
                    $child = $childrenOfChild;
                    $childrenOfChild = [];
                }

                [$childName, $childType] = explode('|', $child);

                $newChildCategory = $newCategory->children()->create(
                    [
                    'title' => ucfirst($childName),
                    'slug' => Str::slug($childName),
                    'thumbnail' => '/preview-icon.png',
                    'is_menu_bottom' => false,
                    ]
                );

                foreach ($childrenOfChild as $childOfChild => $childc4) {
                    if (is_numeric($childOfChild)) {
                        $childOfChild = $childc4;
                        $childc4 = [];
                    }

                    [$childOfName, $childOfType] = explode('|', $childOfChild);

                    $newChildOfCategory = $newChildCategory->children()->create(
                        [
                        'title' => ucfirst($childOfName),
                        'slug' => Str::slug($childOfName),
                        'thumbnail' => '/preview-icon.png',
                        'is_menu_bottom' => false,
                        ]
                    );

                    foreach ($childc4 as $abc =>$childc5) {
                        if (is_numeric($abc)) {
                            $abc = $childc5;
                            $childc5 = [];
                        }
                        [$abcName, $abcType] = explode('|', $abc);

                        $newChildc5 = $newChildOfCategory->children()->create(
                            [
                            'title' => ucfirst($abcName),
                            'slug' => Str::slug($abcName),
                            'thumbnail' => '/preview-icon.png',
                            'is_menu_bottom' => false,
                            ]
                        );
                        foreach($childc5 as $ab) {

                            [$abName, $abType] = explode('|', $ab);

                            $newChildc5->children()->create(
                                [
                                'title' => ucfirst($abName),
                                'slug' => Str::slug($abName),
                                'thumbnail' => '/preview-icon.png',
                                'is_menu_bottom' => false,
                                ]
                            );
                        }
                    }
                }
            }
        }
    }
}

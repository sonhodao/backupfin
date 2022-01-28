<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;
use App\Models\Category;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuItems::truncate();
        $mainMenu = Menus::byName("Main-menu");
        if ($mainMenu) {
            $mainMenu->delete();
        }
        $menu = new Menus();
        $menu->name = 'Main-menu';
        $menu->save();

        $lists =  [
            'Trang chủ|/',
            'Tin tức|1' => [
                'Tin nổi bật|1' => [
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


        foreach ($lists as $item1 => $children1) {
            if (is_numeric($item1)) {
                $item1 = $children1;
                $children1 = [];
            }
            [$labelmenu1, $linkmenu1] = explode('|', $item1);
            $menuitem1 = new MenuItems();
            $menuitem1->label = $labelmenu1;
            $menuitem1->link = $linkmenu1;
            if (!$labelmenu1 != '/') {
                $category = Category::where("title", $labelmenu1)->first();
                if ($category) {
                    $menuitem1->link = route('fe.post.category', ["id" => $category->id, "slug" => $category->slug]);
                }
            }
            $menuitem1->menu = $menu->id;
            $menuitem1->depth = 0;
            $menuitem1->sort = MenuItems::getNextSortRoot($menu->id);
            $menuitem1->save();

            foreach ($children1 as $item2 => $children2) {
                if (is_numeric($item2)) {
                    $item2 = $children2;
                    $children2 = [];
                }
                [$labelmenu2, $linkmenu2] = explode('|', $item2);
                $menuitem2 = new MenuItems();
                $menuitem2->label  = $labelmenu2;
                $menuitem2->link   = $linkmenu2;
                $category = Category::where("title", $labelmenu2)->first();
                if ($category) {
                    $menuitem2->link = route('fe.post.category', ["id" => $category->id, "slug" => $category->slug]);
                }
                $menuitem2->menu   = $menu->id;
                $menuitem2->depth   = 1;
                $menuitem2->parent = $menuitem1->id;
                $menuitem2->sort = MenuItems::getNextSortRoot($menu->id);
                $menuitem2->save();

                foreach ($children2 as $item3 => $children3) {
                    if (is_numeric($item3)) {
                        $item3 = $children3;
                        $children3 = [];
                    }

                    [$labelmenu3, $linkmenu3] = explode('|', $item3);
                    $menuitem3 = new MenuItems();
                    $menuitem3->label  = $labelmenu3;
                    $menuitem3->link   = $linkmenu3;
                    $category = Category::where("title", $labelmenu3)->first();
                    if ($category) {
                        $menuitem3->link = route('fe.post.category', ["id" => $category->id, "slug" => $category->slug]);
                    }
                    $menuitem3->menu   = $menu->id;
                    $menuitem3->depth   = 2;
                    $menuitem3->parent = $menuitem2->id;
                    $menuitem3->sort = MenuItems::getNextSortRoot($menu->id);
                    $menuitem3->save();
                }
            }
        }
    }
}

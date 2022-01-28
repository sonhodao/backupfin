<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TextLink;

class TextLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        $textLinks = [
            [
                'model' => 'Home',
                'type' => 1,
                'link' => '#',
                'is_home' =>1,
                'status' =>1,
                'text' => 'Digital Camera',
                'created_at'=>$now
            ],
            [
                'model' => 'Home',
                'type' => 1,
                'link' => '#',
                'is_home' =>1,
                'status' =>1,
                'text' => 'Ống Kính - Lens',
                'created_at'=>$now
            ],
            
            [
                'model' => 'Home',
                'type' => 1,
                'link' => '#',
                'is_home' =>1,
                'status' =>1,
                'text' => 'Ống Kính - Lens',
                'created_at'=>$now
            ],
            
            [
                'model' => 'Home',
                'type' => 1,
                'link' => '#',
                'is_home' =>1,
                'status' =>1,
                'text' => 'Điện Thoại',
                'created_at'=>$now
            ],
            
            [
                'model' => 'Home',
                'type' => 1,
                'link' => '#',
                'is_home' =>1,
                'status' =>1,
                'text' => 'Loa Di Động',
                'created_at'=>$now
            ],
            [
                'model' => 'Home',
                'type' => 1,
                'link' => '#',
                'is_home' =>1,
                'status' =>1,
                'text' => 'Mac Desktop',
                'created_at'=>$now
            ],
            [
                'model' => 'Home',
                'type' => 1,
                'link' => '#',
                'is_home' =>1,
                'status' =>1,
                'text' => 'Macbook',
                'created_at'=>$now
            ],
            [
                'model' => 'Home',
                'type' => 1,
                'link' => '#',
                'is_home' =>1,
                'status' =>1,
                'text' => 'iPhone',
                'created_at'=>$now
            ],
            [
                'model' => 'Home',
                'type' => 1,
                'link' => '#',
                'is_home' =>1,
                'status' =>1,
                'text' => 'Tivi',
                'created_at'=>$now
            ],
            [
                'model' => 'Home',
                'type' => 1,
                'link' => '#',
                'is_home' =>1,
                'status' =>1,
                'text' => 'SoundBars',
                'created_at'=>$now
            ],
            
            [
                'model' => 'Home',
                'type' => 1,
                'link' => '#',
                'is_home' =>1,
                'status' =>1,
                'text' => 'Loa Hi-End',
                'created_at'=>$now
            ],
            /*  [
                'model' => 'Home',
                'type' => 1,
                'link' => '#',
                'is_home' =>1,
                'status' =>1,
                'text' => 'Amply Hi-End',
                'created_at'=>$now
            ],
            [
                'model' => 'Home',
                'type' => 1,
                'link' => '#',
                'is_home' =>1,
                'status' =>1,
                'text' => 'Đầu phát Hi-End',
                'created_at'=>$now
            ],*/

        ];
        TextLink::truncate();
        TextLink::insert($textLinks);
    }
}

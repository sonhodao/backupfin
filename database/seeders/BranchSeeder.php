<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::truncate();
        $branches = [
            [
                'title' => 'Hà Nội',
                'address' => 'Tòa nhà văn phòng số 57 Vũ Trọng Phụng,P. Thanh Xuân Trung, Thanh Xuân, Hà Nội',
                'hotline' => '024 2346 1889',
                'google_map' => '',
            ]
        ];
        foreach ($branches as $row) {
            Branch::create(['title' => $row["title"], 'address' => $row["address"],'hotline' => $row["hotline"]]);
        }
    }
}
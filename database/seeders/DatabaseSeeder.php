<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(FooterLinkSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(MediaFolderSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(WardsTableSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(TextLinkSeeder::class);
        $this->call(HomeTextTableSeeder::class);

    }
}

<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'dashboard.index',

            'roles.index',
            'roles.store',
            'roles.update',
            'roles.destroy',

            'users.index',
            'users.store',
            'users.update',
            'users.destroy',
            'users.assignRoles',
            'users.assignPermissions',

            'settings.index',
            'settings.log',
            'settings.destroy',
            'settings.update',

            'categories.index',
            'categories.store',
            'categories.update',
            'categories.destroy',

            'posts.index',
            'posts.store',
            'posts.update',
            'posts.destroy',

            'reviews.index',
            'reviews.destroy',
            'reviews.update',


            'sliders.index',
            'sliders.destroy',
            'sliders.store',
            'sliders.update',

            'banners.index',
            'banners.destroy',
            'banners.store',
            'banners.update',

            'redirections.index',
            'redirections.destroy',
            'redirections.store',
            'redirections.update',

            'Branches.index',
            'Branches.destroy',
            'Branches.store',
            'Branches.update',

            'pages.index',
            'pages.store',
            'pages.update',
            'pages.destroy',

            'text_links.index',
            'text_links.store',
            'text_links.update',
            'text_links.destroy',

            'newsletters.index',
            'newsletters.store',
            'newsletters.update',
            'newsletters.destroy',

            'contacts.index',
            'contacts.store',
            'contacts.update',
            'contacts.destroy',

            'accounts.index',
            'accounts.store',
            'accounts.update',
            'accounts.destroy',

            'menus.index',
            'menus.store',
            'menus.update',
            'menus.destroy',

            'navigations.index',
            'navigations.store',
            'navigations.update',
            'navigations.destroy',

            'media.index',
            'media.store',
            'media.update',
            'media.destroy',

            'seos.index',
            'seos.store',
            'seos.update',
            'seos.destroy',

        
        ];

        foreach ($permissions as $permission) {
            if (!Permission::whereName($permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }

        // create roles and assign created permissions
        if (!Role::whereName('Super Admin')->exists()) {
            Role::create(['name' => 'Super Admin'])->givePermissionTo(Permission::all());

            // create default admin
            $user = User::create(
                [
                'name' => 'Admin',
                'email' => 'admin@finvn.vn',
                'password' => bcrypt('Admin@#!%$^321'),
                ]
            );

            $user->assignRole('Super Admin');
        }
    }
}

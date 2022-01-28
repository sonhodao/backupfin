<?php

namespace App\Repositories;

use App\Models\AdminMenuItem;
use App\Models\Banner;
use Harimayco\Menu\Models\MenuItems;

class MenuItemRepository
{
    protected $adminMenuItem;

    public function __construct(AdminMenuItem $adminMenuItem)
    {
        $this->adminMenuItem = $adminMenuItem;
    }

    public function getMenuItems()
    {
        return $this->adminMenuItem->where('is_home', true)->orderBy('sort', 'ASC')->get();
    }

}

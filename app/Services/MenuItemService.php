<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\MenuItemRepository;

class MenuItemService
{
    protected $menuItemRepository;

    public function __construct(MenuItemRepository $menuItemRepository)
    {
        $this->menuItemRepository = $menuItemRepository;
    }

    public function getMenuItems()
    {
        return $this->menuItemRepository->getMenuItems();
    }


}

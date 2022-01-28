<?php

namespace App\Repositories;
use App\Models\Banner;

class BannerRepository
{
    protected $banner;

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    public function getByPosition($position)
    {
        return $this->banner->where('status', true)
            ->where('position', $position)
            ->orderBy('sort', 'desc')
            ->orderBy('id', 'desc')
            ->first(['id','title','thumbnail','link']);
    }

}

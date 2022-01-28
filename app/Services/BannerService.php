<?php 

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\BannerRepository;

class BannerService
{
    protected $bannerRepository; 

    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    public function getByPosition($position)
    {
        return $this->bannerRepository->getByPosition($position);
    }


}
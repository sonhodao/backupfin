<?php 

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\SliderRepository;

class SliderService
{

    protected $sliderRepository;

    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }
    
    public function getSliderHome()
    {
        return $this->sliderRepository->getSliderAtHome();
    }
}
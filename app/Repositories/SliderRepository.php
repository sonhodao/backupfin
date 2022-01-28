<?php

namespace App\Repositories;
use App\Models\Slider;

class SliderRepository
{
    protected $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    
    public function getSliderAtHome()
    {
        return $this->slider->where('status', true)
            ->where('status', true)
            ->orderBy('sort')
            ->orderByDesc('id')
            ->get();
    }
}

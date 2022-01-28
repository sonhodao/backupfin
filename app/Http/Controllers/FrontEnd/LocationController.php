<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Get district by province
     *
     */

    public function district(Request $request)
    {
        $provinceId = $request->get("province_id");
        return view('front_end.partials.forms.district', compact('provinceId'));
    }

    /**
     * Get district by province
     *
     */

    public function ward(Request $request)
    {
        $districtId = $request->get("district_id");
        return view('front_end.partials.forms.ward', compact('districtId'));
    }
}

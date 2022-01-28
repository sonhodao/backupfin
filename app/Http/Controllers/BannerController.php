<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerUpdate;
use App\Http\Requests\BannerStore;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use DB;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $references = Banner::orderBy('id', 'desc')->paginate(6);
        return view('banners.index', compact('references'));
    }

    public function create()
    {
        return view('banners.form');
    }

    protected function getRelationId($items, $class)
    {
        return collect($items)->filter(fn ($item) => ($item->model == $class))->pluck('model_id')->values()->toArray();
    }

    public function listBanners($type, $id)
    {
        
       
        if (!in_array($type, ['category','category_post', 'home','post_tag'])) {
            return [];
        }
        $mapModel = [
            'category' => Category::class,
            'category_post' => Category::class,
            'home' => 'Home'
        ];
        return Banner::where('model', $mapModel[$type])
            ->where('model_id', $id)
            ->get();
    }

    public function store(BannerStore $request)
    {

        $data = $request->validated();
        $banner = null;

        if (!empty($data['id'])) {
            $banner = Banner::find($data['id']);
        }

        if (!empty($banner)) {
        } else {
            $banner = new Banner();
        }

        foreach ($data as $key => $value) {

            if (in_array($key, $banner->getFillable())) {
                $banner->{$key} = $value;
            }
        }

        $banner->save();

        return redirect()->route('banners.index');
    }


    public function edit(Banner $banner)
    {
        $banners = $banner;
        return view('banners.form', compact('banners'));
    }

    public function Update(BannerUpdate $request,Banner $banner)
    {
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $banner->update($input);
    
        return redirect()->route('banners.index');
    }


    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function quickUpdate(Request $request): JsonResponse
    {
        $this->authorize('banners.update');
        $type = $request->input('type');
        $value = $request->input('value');
        $id = $request->input('id');
        $dataUpdate = [$type => $value];
        $result = Banner::where('id', '=', $id)
            ->withoutGlobalScope('published')
            ->update($dataUpdate);

        if ($result) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }


    public function destroy(Banner $banner)
    {
        $banner->delete();
    }

}

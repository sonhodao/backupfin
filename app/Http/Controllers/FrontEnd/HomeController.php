<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Services\PostCategoryService;
use App\Services\PostService;
use App\Services\BannerService;
use App\Services\MenuItemService;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    protected $postService, $postCategoryService,$bannerService,$menuItemService;

    public function __construct(PostService $postService, PostCategoryService $postCategoryService,BannerService $bannerService, MenuItemService $menuItemService)
    {
        $this->postService = $postService;
        $this->postCategoryService = $postCategoryService;
        $this->bannerService = $bannerService;
        $this->menuItemService = $menuItemService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        $data['isFrontEndHome'] = 1;
        $data['hots']=$this->postService->getHots();
        $data['lastests'] = $this->postService->getLastest();
        $data['mosts'] = $this->postService->getMosts();

        $data['trendings'] =  $this->postService->getTrendings();
        $data['categoriesPopular'] = $this->postCategoryService->getCategoriesPopular();
        $data['populars'] = $this->postService->getPopulars($request->all());
        $data['categories'] = $this->postCategoryService->getProductCategoryAtHome();
        $data['postsByCategories'] = $this->postService->getAtHomeByCategories($data['categories']);

        $data['bannerHomeCenter'] = $this->bannerService->getByPosition('HOME_CENTER');
        $data['bannerHomeRight']  = $this->bannerService->getByPosition('HOME_RIGHT');
        $data['menuItems']  = $this->menuItemService->getMenuItems();

        // Set meta
        $settings = getMainSettings();
        $robots = getMetaRobots('', 0);
        $meta = [];
        $meta['title'] = $settings['site_name'] ? $settings['site_name'] : config("f9web-laravel-meta.title-default");
        $meta['description'] = $settings['site_description'] ? $settings['site_description'] : config("f9web-laravel-meta.description-default");
        $meta['keywords'] = config("f9web-laravel-meta.keywords-default");
        $meta['image'] = asset(config('admin.og_image_url'));
        $meta['canonical'] = route('fe.home');
        $meta['robots'] = $robots;
        setMeta($meta);
        /* Hết Set meta */

        return view('front_end.home.index', $data);
    }


        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function page(Request $request)
    {
        $data = [];

        $data['hots']=$this->postService->getHots();
        $data['lastests'] = $this->postService->getLastest();
        $data['mosts'] = $this->postService->getMosts();

        $data['trendings'] =  $this->postService->getTrendings();
        $data['categoriesPopular'] = $this->postCategoryService->getCategoriesPopular();
        $data['populars'] = $this->postService->getPopulars($request->all());
        $data['categories'] = $this->postCategoryService->getProductCategoryAtHome();
        $data['postsByCategories'] = $this->postService->getAtHomeByCategories($data['categories']);

        $data['bannerHomeCenter'] = $this->bannerService->getByPosition('HOME_CENTER');
        $data['bannerHomeRight']  = $this->bannerService->getByPosition('HOME_RIGHT');

        // Set meta
        $settings = getMainSettings();
        $robots = getMetaRobots('', 0);
        $meta = [];
        $meta['title'] = $settings['site_name'] ? $settings['site_name'] : config("f9web-laravel-meta.title-default");
        $meta['description'] = $settings['site_description'] ? $settings['site_description'] : config("f9web-laravel-meta.description-default");
        $meta['keywords'] = config("f9web-laravel-meta.keywords-default");
        $meta['image'] = asset(config('admin.og_image_url'));
        $meta['canonical'] = route('fe.home');
        $meta['robots'] = $robots;
        setMeta($meta);
        /* Hết Set meta */

        return view('front_end.home.page', $data);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function popular(Request $request)
    {
        $posts = $this->postService->getPopulars($request->all());
        $totalPage = 10;//$posts->lastPage();
        return response()->json(
            [
            'items_markup' => view('front_end.home.elements.popular-ajax', compact('posts'))->render(),
            'totalPage' => $totalPage,
            ]
        );
    }


}

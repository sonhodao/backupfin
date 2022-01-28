<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostCategoryService;
use App\Services\PostService;

class SearchController extends Controller
{
    protected $postService, $postCategoryService;

    public function __construct(PostService $postService, PostCategoryService $postCategoryService)
    {
        $this->postService = $postService;
        $this->postCategoryService = $postCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $q = $request->get('q');
        $q = trim($q);
        $keyword = str_replace(" ", "%", $q);
        $posts =  $this->postService->searchFormCustomer($request);
        $parentCategories = $this->postCategoryService->getParentCategory();
        $meta = [];
        if ($q) {
            $metaTitle = 'Kết quả tìm kiếm ' . $q . ' | Finvn.vn';
            $meta['title'] = $metaTitle;
            $meta['og:title'] = $metaTitle;
            $meta['description'] = $metaTitle;
            $meta['og:description'] = $metaTitle;
            $meta['keywords'] = $q;
            $meta['canonical'] = route('fe.search.index', ['q' => $q]);
        }

        $meta['robots'] = 'robots, noindex,nofollow';
        setMeta($meta);
        return view('front_end.searchs.index', compact('q', 'posts', 'parentCategories'));
    }

    public function suggest(Request $request)
    {
        $q = $request->get('q');
        $q = trim($q);
        $q = str_replace(" ", "%", $q);
        $posts = Post::where('title', 'LIKE', "%{$q}%")
            ->orderByDesc('id')
            ->take(5)->get();
        return view('front_end.searchs.suggest', compact('posts'));
    }
}

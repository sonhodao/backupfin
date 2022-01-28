<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Category;

use App\Models\Page;

class SiteMapController extends Controller
{
    public function index()
    {
        $data =[];
        return response()->view('front_end.sitemap.index', $data)->header('Content-Type', 'text/xml');
    }


    public function categories()
    {
        $categories = Category::all();
        return response()->view(
            'front_end.sitemap.post_categories', [
            'categories' => $categories,
            ]
        )->header('Content-Type', 'text/xml');
    }

    public function posts()
    {
        $posts = Post::all();
        return response()->view(
            'front_end.sitemap.posts', [
            'posts' => $posts,
            ]
        )->header('Content-Type', 'text/xml');
    }

    public function page()
    {
        $pages = Page::latest()->get();
        return response()->view(
            'front_end.sitemap.pages', [
            'pages' => $pages,
            ]
        )->header('Content-Type', 'text/xml');
    }
}

<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Services\PostCategoryService;
use App\Services\PostService;
use App\Services\VisitorService;
use App\Services\TextLinkService;
use Spatie\Tags\Tag;
use App\Models\Tag as MTag;

class PostController extends Controller
{
    protected $postService, $postCategoryService, $visitorService;

    public function __construct(PostService $postService, PostCategoryService $postCategoryService, VisitorService $visitorService, TextLinkService $textLinkService)
    {

        $this->postService = $postService;
        $this->postCategoryService = $postCategoryService;
        $this->visitorService = $visitorService;
        $this->textLinkService = $textLinkService;
    }


    public function category($slug, $id)
    {
        $category = $this->postCategoryService->getCategoryById($id);
        if ($category->slug != $slug) {
            return Redirect::to(route('fe.post.category', ["slug" => $category->slug, 'id' => $category->id]), 301);
        }
        $posts = $this->postCategoryService->getPostCategory($category, $slug);
        $parentCategories = $this->postCategoryService->getParentCategory();
        // Set meta
        $settings = getMainSettings();
        $robots = getMetaRobots($category->seo, 1);
        $meta = [];
        $meta['title'] = (!empty($category->seo->title)) ? $category->seo->title : $category->title;
        $meta['description'] = strip_tags((!empty($category->seo->description)) ? $category->seo->description : $category->short_description);
        $meta['keywords'] = (!empty($category->seo->keyword)) ? $category->seo->keyword : '';
        if (!empty($category->seo->image)) {
            $meta['image'] = $category->seo->image;
        } elseif (!empty($category->thumbnail)) {
            $meta['image'] = $category->thumbnail;
        } else {
            $meta['image'] = asset(config('admin.og_image_url'));
        }
        $meta['canonical'] = (!empty($category->seo->canonical)) ? $category->seo->canonical : route(
            'fe.post',
            [
                "slug" =>  $category->slug,
                'id' =>  $category->id,
            ]
        );
        $meta['robots'] = $robots;
        $meta['keywords'] = (!empty($category->seo->keyword)) ? $category->seo->keyword : '';
        setMeta($meta);
        // End set meta


        return view('front_end.posts.category', compact('category', 'parentCategories', 'posts'));
    }

    public function show($slug, $id)
    {
        $post = $this->postService->getPostById($id);
        // Redirect
        if ($post->slug != $slug) {
            return Redirect::to(route('fe.post', ["slug" => $post->slug, 'id' => $post->id]), 301);
        }
        // End redirect
        $relatedPosts = $this->postService->getRelatedPost($post);

        /* Set view */
        $this->visitorService->setViewsCount($id, \App\Models\Post::class);

        // Set meta
        $settings = getMainSettings();
        $robots = getMetaRobots($post->seo, 1);
        $meta = [];
        $meta['title'] = (!empty($post->seo->title)) ? $post->seo->title : $post->title;
        $meta['description'] = strip_tags((!empty($post->seo->description)) ? $post->seo->description : $post->short_description);
        $meta['keywords'] = (!empty($post->seo->keyword)) ? $post->seo->keyword : '';
        if (!empty($post->seo->image)) {
            $meta['image'] = $post->seo->image;
        } elseif (!empty($post->thumbnail)) {
            $meta['image'] = $post->thumbnail;
        } else {
            $meta['image'] = asset(config('admin.og_image_url'));
        }
        $meta['canonical'] = (!empty($post->seo->canonical)) ? $post->seo->canonical : route(
            'fe.post',
            [
                "slug" =>  $post->slug,
                'id' =>  $post->id,
            ]
        );
        $meta['keywords'] = (!empty($post->seo->keyword)) ? $post->seo->keyword : '';
        $meta['robots'] = $robots;
        setMeta($meta);
        // End set meta


        return view('front_end.posts.show', compact('post', 'relatedPosts'));
    }


    public function print($id)
    {
        $post = $this->postService->getPostById($id);
        // Set meta
        $meta['title'] = 'Print <' . $post->title . '>';
        $meta['robots'] = 'nofollow, noindex';
        setMeta($meta);
        // End set meta
        return view('front_end.posts.print', compact('post'));
    }

    public function tag($slug)
    {
        $locale =  $locale ?? app()->getLocale();
        $tag    =  Tag::where("slug->{$locale}", $slug)->where('type', 'post')->first();
        $mTag   =  MTag::findOrFail($tag->id);
        $posts  =  $mTag->posts()->paginate();
        $parentCategories = $this->postCategoryService->getParentCategory();
        $meta = [];
        $metaTitle = 'Bài viết về ' . $tag->name . ' | Finvn.vn';
        $meta['title'] = $metaTitle;
        $meta['og:title'] = $metaTitle;
        $meta['description'] = $metaTitle;
        $meta['og:description'] = $metaTitle;
        $meta['keywords'] = $metaTitle . ',' . 'Finvn';
        $meta['canonical'] = route('fe.post.tag', ['slug' => $slug]);
        
        setMeta($meta);
        return view('front_end.posts.tag', compact('tag', 'posts', 'parentCategories'));
    }
}

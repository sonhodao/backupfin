<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use App\Models\Post;

class PostRepository
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getTrendings()
    {
        return $this->post
            ->with('categories')
            ->where('is_trending', true)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
    }

    public function getPopulars($filter)
    {
        $limitStart = !empty($filter["limitstart"]) ? $filter["limitstart"] :0;
        return Post::filter($filter)
            ->with('categories')
            ->where('is_popular', true)
            ->orderBy('created_at', 'desc')
            ->skip($limitStart)
            ->take(5)
            ->get();
    }

    public function getAtHomeByCategories($categories)
    {
        if (!$categories) {
            return Collection::make([]);
        }

        $posts = Collection::make([]);
        $limit = 4;
        foreach ($categories as $category) {
            $posts = $posts->mergeRecursive(
                $category
                    ->posts()
                    ->orderByDesc('sort')
                    ->orderByDesc('id')
                    ->take($limit)
                    ->get()
            );
        }

        return $posts;

    }


    public function getHots()
    {
        return $this->post
            ->with('categories')
            ->where('status', array_search('publish', Post::STATUS))
            ->orWhere('is_hot', true)
            ->orderBy('sort', 'asc')
            ->orderBy('created_at', 'desc')
            ->take(19)
            ->get();
    }

    public function getLastest()
    {
        return $this->post
            ->with('categories')
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();
    }

    public function getMosts()
    {
        return $this->post
            ->with('categories')
            ->orderBy('view_count', 'desc')
            ->take(4)
            ->get();
    }

    public function getPostById($id)
    {

        return Post::with(['categories.posts'])
            ->where('status', array_search('publish', Post::STATUS))
            ->findOrFail($id);
    }

    public function searchFormCustomer($request)
    {

        return Post::with('categories')
            ->where('status', array_search('publish', Post::STATUS))
            ->where('created_at', '<', now())
            ->where("title", "like", "%$request->q%")
            ->orderBy('created_at', 'desc')
            ->paginate();
    }

    
}

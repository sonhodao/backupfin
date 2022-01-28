<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use Illuminate\Support\Collection;
use Redirect;

class PostService
{
    protected $postRepository;
    
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getTrendings()
    {
        return $this->postRepository->getTrendings();
    }
    public function getPopulars($filter)
    {
        return $this->postRepository->getPopulars($filter);
    }

    public function getAtHomeByCategories($categories)
    {
        return $this->postRepository->getAtHomeByCategories($categories);
    }

    public function getHots()
    {
        return $this->postRepository->getHots();
    }

    public function getLastest()
    {
        return $this->postRepository->getLastest();
    }

    public function getMosts()
    {
        return $this->postRepository->getMosts();
    }
    public function getPostById($id)
    {
        $post = $this->postRepository->getPostById($id);
        return $post;
    }

    public function getRelatedPost($post)
    {
        $numRelatedPosts = 7;
        $relatedPosts = new Collection();
        foreach ($post->categories as $category) {
            $relatedPosts = $relatedPosts->merge($category->posts->where('id', '<>', $post->id)->take($numRelatedPosts - $relatedPosts->count()));
            if ($relatedPosts->count() == $numRelatedPosts) { 
                return $relatedPosts;
            }
        }
        return $relatedPosts;
    }

    public function searchFormCustomer($request)
    {
        return $this->postRepository->searchFormCustomer($request);
    }


}

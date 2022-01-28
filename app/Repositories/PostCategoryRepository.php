<?php

namespace App\Repositories;
use App\Models\Category;
use App\Models\Post;
use App\Models\TextLink;

class PostCategoryRepository
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    
    public function getCategoriesPopular()
    {
        return $this->category
            ->where('status', array_search('publish', Category::STATUS))
            ->where('is_menu_popular', true)
            ->get();
    }

    public function getProductCategoryAtHome()
    {
        return $this->category
            ->where('status', array_search('publish', Category::STATUS))
            ->where('is_menu_home', true)
            ->take(3)
            ->get();
    }

    public function getParentCategory()
    {
        return $this->category
            ->withCount('posts')
            ->where('status', array_search('publish', Category::STATUS))
            ->where('parent_id', null)
            ->get();
    }

    public function getCategoryById($id)
    {

        return $this->category->findOrFail($id);
    }

    public function getPostCategory($category)
    {

        $postCategorys = $this->category->with(['posts'])
            ->findOrFail($category->id)
            ->posts()
            ->where('status', array_search('publish', Post::STATUS))
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return $postCategorys;
    }

}

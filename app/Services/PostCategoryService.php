<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\PostCategoryRepository;
use Illuminate\Support\Facades\Redirect;

class PostCategoryService
{
    protected $categoryRepository;

    public function __construct(PostCategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategoriesPopular()
    {
        return $this->categoryRepository->getCategoriesPopular();
    }

    public function getProductCategoryAtHome()
    {
        return $this->categoryRepository->getProductCategoryAtHome();
    }

    public function getParentCategory()
    {
        return $this->categoryRepository->getParentCategory();
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->getCategoryById($id);
    }

    public function getPostCategory($category,$slug)
    {
        if ($category->slug != $slug) {
            return Redirect::to(route('fe.post.category', ["slug" => $category->slug, 'id' => $category->id]), 301);
        }
        return $this->categoryRepository->getPostCategory($category);
    }

}

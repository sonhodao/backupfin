<?php

namespace App\ModelFilters;

use App\Models\Category;
use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;

class PostFilter extends ModelFilter
{
    /**
     * Filter post by categories.
     *
     * @param string|array $value
     *
     * @return \App\ModelFilters\PostFilter
     */
    public function categories($value): PostFilter
    {
        if (!is_array($value)) {
            $value = explode(',', $value);
        }

        if (empty($value)) {
            return $this;
        }

        $categories = Category::with('descendants')->whereIn('id', $value)->get(['id', '_lft', '_rgt', 'parent_id']);

        return $this->whereHas(
            'categories', function (Builder $query) use ($categories) {
                return $query->whereIn('id', $categories->pluck('id'));
            }
        );
    }


    /**
     * Filter post by post_categories.
     *
     * @param string|array $value
     *
     * @return \App\ModelFilters\PostFilter
     */
    public function categoryId($value): PostFilter
    {
        if (empty($value)) {
            return $this;
        }

        return $this->whereHas(
            'categories', function (Builder $query) use ($value) {
                return $query->where('id', $value);
            }
        );
    }

    

    public function status($value)
    {
        return $this->where('status', $value);
    }

    public function title($value)
    {
        return $this->whereLike('title', $value);
    }

    public function author($value)
    {
        return $this->whereLike('author', $value);
    }

    public function createdAt($value)
    {
        return $this->whereBetween('created_at', dateRangePicker($value));
    }

    public function isHot($value)
    {
        return $this->where('is_hot', (bool)$value);
    }

    public function isTrending($value)
    {
        return $this->where('is_trending', (bool)$value);
    }

    public function isPopular($value)
    {
        return $this->where('is_popular', (bool)$value);
    }

    public function sortType($number)
    {
        if($number == config('order-search-config.post_config.latest')) {
            return $this->orderBy('published_at', 'desc');
        }elseif($number == config('order-search-config.post_config.oldest')) {
            return $this->orderBy('published_at', 'asc');
        }
    }

    public function id($value)
    {
        return $this->where('id', $value);
    }
}

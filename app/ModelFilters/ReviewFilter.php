<?php

namespace App\ModelFilters;

use App\Models\Category;
use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;

class ReviewFilter extends ModelFilter
{

    public function approved($value)
    {
        return $this->where('approved', $value);
    }

    public function title($value)
    {
        return $this->whereLike('title', $value);
    }
   
    public function createdAt($value)
    {
        return $this->whereBetween('created_at', dateRangePicker($value));
    }
}

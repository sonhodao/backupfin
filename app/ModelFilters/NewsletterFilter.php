<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class NewsletterFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */

    public function id($value)
    {
        return $this->where('id', $value);
    }

    public function email($value)
    {
        return $this->where('email', $value);
    }

    public function createdAt($value)
    {
        return $this->whereBetween('created_at', dateRangePicker($value));
    }
}

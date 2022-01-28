<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class AccountFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function email($value)
    {
        return $this->where('email', $value);
    }
    public function name($value)
    {
        return $this->where('name', $value);
    }

    public function mobile($value)
    {
        return $this->where('mobile', $value);
    }

    public function createdAt($value)
    {
        return $this->whereBetween('created_at', dateRangePicker($value));
    }
}

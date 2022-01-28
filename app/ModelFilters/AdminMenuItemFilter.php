<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class AdminMenuItemFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function label($value)
    {
        return $this->whereLike('label', $value);
    }
    public function link($value)
    {
        return $this->where('link', $value);
    }
    public function text($value)
    {
        return $this->whereLike('text', $value);
    }

    public function createdAt($value)
    {
        return $this->whereBetween('created_at', dateRangePicker($value));
    }
}

<?php

namespace App\ModelFilters;


use EloquentFilter\ModelFilter;


class TextLinkFilter extends ModelFilter
{

    public function modelId($value)
    {
        return $this->where('model_id', $value);
    }


    public function model($value)
    {
        return $this->where('model', $value);
    }

    public function type($value)
    {
        return $this->where('type', $value);
    }

    public function text($value)
    {
        return $this->whereLike('text', $value);
    }
    
    public function link($value)
    {
        return $this->whereLike('link', $value);
    }

    public function createdAt($value)
    {
        return $this->whereBetween('created_at', dateRangePicker($value));
    }

}

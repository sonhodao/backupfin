<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMenuItem extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'label',
        'link',
        'parent',
        'sort',
        'class',
        'menu',
        'depth',
        'is_brand',
        'color',
        'icon',
        'text',
        'thumbnail',
        'is_home'
    ];
}

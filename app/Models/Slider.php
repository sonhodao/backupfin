<?php

namespace App\Models;

use App\Traits\ForgetResponseCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nicolaslopezj\Searchable\SearchableTrait;

class Slider extends Model
{
    use SearchableTrait, ForgetResponseCache;

    public static $cacheTags = 'sliders';

    public const TYPE_DESKTOP = 1;
    public const TYPE_MOBILE = 2;

    public const MODEL = [
        'Home',
        Category::class
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'info',
        'thumbnail',
        'link',
        'type',
        'sort',
        'model',
        'model_id',
        'status',
        'target',
        'rel',
    ];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'title' => 1,
        ],
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'model_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nicolaslopezj\Searchable\SearchableTrait;

class Banner extends Model
{
    use SearchableTrait;

    public const TYPE = [
        'default',
        'mobile',
        'desktop',
    ];

    public const POSITION = [
        'HEADER',
        'HOME_CENTER',
        'HOME_RIGHT',
    ];

    public const TYPES = [
        'Home',
        Category::class ,
    ];

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
        'info',
        'thumbnail',
        'link',
        'sort',
        'position',
        'status',
        'type',
        'model',
        'model_id',
        'target',
        'rel',
    ];
    protected $casts = [

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

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'model_id');
    }
}

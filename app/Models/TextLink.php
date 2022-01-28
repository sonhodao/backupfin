<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TextLink extends Model
{

    use Filterable;

    public const MODEL = [
        'Home',
        'PagePost',
        Category::class,
        Post::class
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'model',
        'model_id',
        'thumbnail',
        'text',
        'link', // 1 Thương hiệu 2 Loại sản phẩm
        'rel',
        'type',
        'sort',
        'is_home',
        'status',
        'list_id',
        'index',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_home' => 'boolean',
        'status' => 'boolean',
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'model_id');
    }

    public function scopeByModel($query, $model)
    {
        return $query->where('model', $model);
    }

    public function scopeByModelId($query, $modelId)
    {
        return $query->where('model_id', $modelId);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }
}

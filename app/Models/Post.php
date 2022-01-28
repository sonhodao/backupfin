<?php

namespace App\Models;

use Carbon\Carbon;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Tags\HasTags;
use Spatie\Tags\HasSlug;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Post extends Model implements Viewable
{
    use InteractsWithViews,Filterable, SearchableTrait, HasTags , SoftDeletes;
    public static $hiddenByStatus = [2,3];
    use HasFactory;

    public const STATUS = [
        1 => 'publish',
        2 => 'pending',
        3 => 'draft',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'excerpt',
        'thumbnail',
        'banner',
        'slug',
        'author_id',
        'author',
        'status',
        'sort',
        'view_count',
        'count_comment',
        'is_popular',
        'is_hot',
        'is_comment',
        'is_trending',
        'is_popular',
        'is_comment',
        'published_at',
    ];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'title' => 10,
            'content' => 5,
            'excerpt' => 1,
        ],
    ];

    protected $casts = [
        'is_hot' => 'boolean',
        'is_trending' => 'boolean',
        'is_popular' => 'boolean',
        'is_comment' => 'boolean',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(
            'enabled', function (Builder $builder) {
                $builder->whereNotIn('status', static::$hiddenByStatus);
            }
        );

        static::addGlobalScope(
            'published', function (Builder $builder) {
                $builder->where('published_at', '<=', Carbon::now()->toDateTimeString());
            }
        );
    }

    /**
     * Get the page's seo meta.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function seo(): MorphOne
    {
        return $this->morphOne(Seo::class, 'model', 'model', 'model_id');
    }

    /**
     * Get the page's seo meta.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    // public function itemRelates(): MorphToMany
    // {
    //     return $this->morphToMany(ItemRelate::class, 'model', 'model', 'model_id');
    // }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }


    public function scopeSortBy(Builder $query, Request $request)
    {
        $sortType = $request->get('sort_type', 'last_update');
        $sortDirection = $request->get('sort_direction', 'desc');

        if ($sortType == 'view') {
            return $query->orderBy('views_count', $sortDirection);
        }

        $columns = [
            'last_update' => 'id',
            'featured' => 'is_hot',
        ];

        return $query->orderBy('sort', 'desc')->orderBy($columns[$sortType], $sortDirection);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

}
<?php

namespace App\Models;

use App\Traits\ForgetResponseCache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use EloquentFilter\Filterable;

class Review extends Model
{
    use ForgetResponseCache,Filterable;

    public static $cacheTags = ['posts', 'reviews'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'user_id',
        'post_id',
        'parent_id',
        'rating',
        'approved',
        'count_like',
        'full_name',
        'email',
        'phone_number',
        'file',
        'publish_at',
    ];
    public static function boot()
    {
        parent::boot();
        
        static::deleting(
            function ($model) {
                $countComment = Review::where('post_id', $model->post_id)->where('approved', true)->where('parent_id', 0)->count();
                Post::where('id', $model->post_id)->update(["count_comment" => $countComment]);
            }
        );
        static::saved(
            function ($model) {
                $countComment = Review::where('post_id', $model->post_id)->where('approved', true)->where('parent_id', 0)->count();
                Post::where('id', $model->post_id)->update(["count_comment" => $countComment]);
            }
        );
        
    }


    protected $casts = [
        'publish_at' => 'datetime',
        'file' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(Account::class, 'user_id', 'id');
    }

    public function post(): BelongsTo
    {
        return $this->BelongsTo(Post::class, 'post_id', 'id');
    }

    

    public function childrens()
    {
        return $this->hasMany(Review::class, 'parent_id')->where('approved', 1);
    }


}

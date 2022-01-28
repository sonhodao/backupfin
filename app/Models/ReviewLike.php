<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;


class ReviewLike extends Model
{
    use HasFactory;
    protected $fillable = [
        'model',
        'model_id',
        'like',
        'account_id'
    ];

}

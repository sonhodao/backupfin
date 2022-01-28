<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;


class Contact extends Model
{
    use HasFactory, Filterable;
    protected $table = 'contacts';
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'content',
        'status',

    ];
}

<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;


class Account extends Authenticatable
{
    use HasFactory, SearchableTrait,Filterable;
    protected $table = 'accounts';
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'sex',
        'address',
        'province',
        'district',
        'ward',
        'name_order',
        'block',
        'street',
        'username',
        'provider',
        'provider_id'

    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class Newsletter extends Model
{
    use Filterable;
    use HasFactory;
    protected $fillable = ['email'];
}

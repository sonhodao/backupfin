<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeText extends Model
{
    use HasFactory;
    protected $fillable = [
        'text_name',
        'text_value',
        'text_type',
    ];
}

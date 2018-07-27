<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrendCategory extends Model
{
    public $table = 'trend_category';

    protected $fillable = [
        'id', 'title', 'slug', 'image', 'description', 'is_active', 'is_deleted'
    ];
}

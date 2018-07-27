<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trend extends Model
{
    public $table = 'trend';

    protected $fillable = [
        'id', 'category_id', 'title', 'slug', 'image', 'description', 'content', 'is_active', 'is_deleted'
    ];


    public function trend_category()
    {
    	return $this->belongsTo('App\TrendCategory', 'category_id', 'id');
    }
}

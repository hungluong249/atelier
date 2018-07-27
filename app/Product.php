<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function kind()
    {
        return $this->belongsTo('App\Kind', 'kind_id', 'id');
    }
}

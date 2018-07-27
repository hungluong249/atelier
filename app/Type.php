<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'type';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function kinds(){
        return $this->hasMany('App\Kind');
    }

    public function product(){
        return $this->hasMany('App\Product');
    }
}

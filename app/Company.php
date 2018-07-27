<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	/**
	 * [$table description]
	 * @var string
	 */
    protected $table = 'company';

    /**
     * [$guarded description]
     * @var array
     */
    protected $guarded = [];
}

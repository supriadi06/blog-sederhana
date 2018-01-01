<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitor extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function comment()
    {
    	return $this->hasMany('App\Comment');
    }
}

<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function category()
    {
    	return $this->belongsTo('App\Admin\Category');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function comment()
    {
    	return $this->hasMany('App\Comment');
    }
}

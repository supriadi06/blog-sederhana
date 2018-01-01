<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function visitor()
    {
    	return $this->belongsTo('App\Visitor');
    }

    public function article()
    {
    	return $this->belongsTo('App\Admin\Article');
    }

    public function parent()
    {
    	return $this->belongsTo('App\Comment', 'parent_id');
    }

    public function child()
    {
    	return $this->hasMany('App\Comment','parent_id','id');
    }
}

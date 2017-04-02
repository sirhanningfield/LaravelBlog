<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function category()
    {
    	# code...
    	return $this->belongsTo('App\Category');
    }

    public function tags()
    {
    	# code...
    	return belongsToMany('App\Tag');
    }
}
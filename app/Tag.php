<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function posts()
    {
    	# code...
    	return belongsToMany('App\Post');
    }

    
}

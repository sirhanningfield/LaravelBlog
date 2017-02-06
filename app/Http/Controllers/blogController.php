<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Session;

class blogController extends Controller
{
    //
    public function getSingle($slug)
    {

    	// get data based on slug 
    	$post = Post::where('slug','=', $slug)->get()->first();

    	//display slug data
    	return view('blog.single')->withPost($post);

    }

    public function getIndex()
    {

    	$posts = Post::orderBy('id','desc')->paginate(10);

    	return view('blog.index')->withPosts($posts);

    }


}

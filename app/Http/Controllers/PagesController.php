<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Session;

/**
* 
*/
class PagesController extends Controller
{
	
	public function getIndex()
	{
		return view('pages.welcome');

	}
	public function getHome()
	{
		// Get all the posts from database
		$posts = Post::orderBy('id','desc')->offset(0)->limit(2)->get();

		// Display all posts to the home page 
		return view('pages.home')->withPosts($posts);

	}


	public function getAbout()
	{
		# code...
		$first = 'Hanan';
		$last = 'Zaroo';
		$fullname = $first." ".$last; 
		$email = $first.".".$last.'@gamil.com';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;

		return view('pages.about')->withData($data);
	}

	public function getContact()
	{
		# code...
		return view('pages.contact');
	}

}


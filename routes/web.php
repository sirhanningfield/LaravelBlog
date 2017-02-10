<?php

Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'blogController@getSingle'])->where('slug','[\w\d\-\_]+');

Route::get('blog',['uses'=>'blogController@getIndex' , 'as'=>'blog.index']);

Route::get('home', 'pagesController@getHome');

Route::get('contact', 'pagesController@getContact');

Route::get('/', 'pagesController@getHome');

Route::get('about', 'pagesController@getAbout');

Route::resource('posts','postController');


Auth::routes();

Route::get('/home', 'HomeController@index');

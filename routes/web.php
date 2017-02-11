<?php

Auth::routes();

/*
 *	Home
 */

Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'root'
]);

/*
 *	Post
 */

Route::resource('posts', 'PostController');

Route::post('/posts/{id}/like', [
	'uses' => 'PostController@postLike',
	'as' => 'posts.like'
]);

Route::post('/posts/{id}/review', [
	'uses' => 'PostController@postReview',
	'as' => 'posts.review'
]);

Route::post('/posts/{id}/cancel', [
	'uses' => 'PostController@postCancel',
	'as' => 'posts.cancel'
]);

/*
 *	Comment
 */

Route::post('/comments', [
	'uses' => 'CommentController@store',
	'as' => 'comments.store'
]);

Route::delete('/comments/{id}', [
	'uses' => 'CommentController@destroy',
	'as' => 'comments.destroy'
]);

/*
 *	Tag
 */

Route::get('/tags', [
	'uses' => 'TagController@index',
	'as' => 'tags.index'
]);

Route::get('/tags/{tag}', [
	'uses' => 'TagController@show',
	'as' => 'tags.show'
]);


Route::post('/tags', [
	'uses' => 'TagController@store',
	'as' => 'tags.store'
]);

Route::delete('/tags/{tag}', [
	'uses' => 'TagController@destroy',
	'as' => 'tags.destroy'
]);

/*
 *	Admin
 */

Route::get('/admin', [
	'uses' => 'AdminController@index',
	'as' => 'admin.index'
]);

Route::get('/admin/reviews', [
	'uses' => 'AdminController@review',
	'as' => 'admin.reviews'
]);

Route::get('/admin/posts', [
	'uses' => 'AdminController@posts',
	'as' => 'admin.posts'
]);

Route::get('/admin/tags', [
	'uses' => 'AdminController@tags',
	'as' => 'admin.tags'
]);
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function()
{
	return view('welcome');
});
Route::get('/article/{id}', 'HomeController@index');
Route::get('/article/{id}/show', 'HomeController@showArticle');
Route::post('/article/{id}/store', ['as' => 'article.store', 'uses'=> 'HomeController@storeComment']);
//Route::post('/article/post_reply/{id}', ['as' => 'article.post_reply', 'uses'=> 'HomeController@post_reply']);
Route::post('/contact', function()
{
	return view('contact');
});
Route::get('/contact', function()
{
	return view('contact');
});
Route::get('/about', function()
{
	return view('about');
});
Route::get('/projects', function()
{
	return view('projects');
});

Auth::routes();

Route::group(['prefix'=>'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function()
{
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/users', 'UserController');
	Route::resource('/categories', 'CategoryController');
	Route::resource('/articles', 'ArticleController');

	/* Article activated or not activated */
	Route::post('/articles/{id}/activated', ['as'=>'articles.activated', 'uses'=>'ArticleController@activated']);
	Route::get('/articles/deactivated-article/{id}', ['as'=>'articles.deactivated-article', 'uses'=>'ArticleController@deactivatedArticle']);
	/* End of Article */


	Route::get('/comments/approved', ['as' => 'comments.approved','uses' => 'CommentController@showApproved']);
	Route::get('/comments/nonapproved', ['as' => 'comments.nonapproved','uses' => 'CommentController@showNonApproved']);
	Route::post('/comments/{id}/activated', ['as'=>'comments.activated', 'uses'=>'CommentController@activated']);
	Route::get('/comments/{id}/deactivated', ['as'=>'comments.deactivated', 'uses'=>'CommentController@deactivated']);
	Route::get('/comments/hapus/{id}/comment', ['as'=>'comments.hapus.comment', 'uses'=>'CommentController@hapusComment']);

	Route::get('/reply/{id}', ['as' => 'comments.reply', 'uses' => 'CommentController@reply']);

});

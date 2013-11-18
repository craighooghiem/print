<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){
	return Redirect::to('index.php');
});
Route::get('/index.php', 'HomeController@index');
Route::get('/product/{product_id}', 'HomeController@product');
Route::any('/product/{product_id}/post', 'HomeController@post_product');
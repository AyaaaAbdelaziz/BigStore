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



Auth::routes();

Route::group(['middleware' => ['web','auth']], function()
{

	Route::get('/cart', function () 
	{
		return view('cart');
		

	});
	Route::get('/', function () 
	{
		return view('index');
		

	});	
	Route::get('/home', function () 
	{
		return view('index');
		

	});
	Route::get('/cart', function () 
	{
		return view('cart');
		

	});
	Route::get('/', function()
	{
		if(Auth::user()->admin == 0)
		{
			return view('index');
		}
		else
		{
			return Redirect::to('/delete-user');
		}
	});
	Route::get('/', function()
	{
		if(Auth::user()->admin == 0)
		{
			return view('index');
		}
		else
		{
			return Redirect::to('/delete-user');
		}
	});
});

Route::resource('index','ProductsController');

Route::resource('/','ProductsController');
Route::resource('home','ProductsController');
Route::get('/cart/{id}/{usernname}','ProductsController@addToCart');
//Route::get('/cart/{usernname}','ProductsController@refresh');

Route::get('/delete-user','UserController@index');
Route::get('/delete-user/{id}','UserController@destroy');
Route::patch('update-cart', 'ProductsController@updateCart');
Route::delete('remove-from-cart', 'ProductsController@removefromCart');


Route::get('/delete-user','UserController@index');
Route::get('/delete-user/{id}','UserController@destroy');

Route::get('/wishlist', 'WishlistController@create');
Route::get('/index', 'IndexController@create');
Route::get('/kitchen', 'KitchenController@create');
Route::get('/offer', 'OfferController@create');

//Route::get('/contact',['uses' => 'ContactMessageController@create']);

Route::get('contact', 'ContactMessageController@create');
Route::post('contact', 'ContactMessageController@mail');

Route::resource('products','ProductsController');

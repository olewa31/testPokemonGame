<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('login', 'PagesController@getLogin');
Route::get('/', 'PagesController@getIndex');
Route::resource('pokemons', 'PokemonController');

//Auth
Route::get('auth/login', array('as' => 'login', 
							   'uses' =>'Auth\AuthController@getLogin'));
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', array('as' => 'logout', 
							    'uses' =>'Auth\AuthController@getLogout'));

//Register
Route::get('auth/register', array('as' => 'register',
								  'uses' =>'Auth\AuthController@getRegister'));
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Users management
Route::resource('users', 'UserController');
Route::put('user/{id}', array('as' => 'admin' ,
							'uses' => 'UserController@update_admin'));

Route::put('pokemon/{id}_abandon', array('as' => 'abandon',
								 'uses' => 'PokemonController@abandon_pokemon'));
Route::put('pokemon/{id}_recruit', array('as' => 'recruit',
								'uses' => 'PokemonController@update_pokemons'));


								 
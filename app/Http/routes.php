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

Route::get('/laravel5', function () {
    return view('welcome');
});

Route::get('/', function(){
	return view('main-page');
});


Route::auth();

Route::group(['middleware'=>'auth'], function(){	

	Route::get('/home', 'HomeController@index');
	// API mikrotik hotspot
	Route::get('/hotspot/profile','MikrotikController@ServerProfile');
	Route::get('/hotspot/ip-binding','MikrotikController@IpBinding');
	Route::get('/hotspot/user','MikrotikController@hsUsers');
	Route::get('/hotspot/user/profile','MikrotikController@UserProfile');
	Route::get('/hotspot/active','MikrotikController@hsActive');	

	Route::get('/router/command','MikrotikController@routerCommand');	

	// Mikrotik user
	Route::get('/user','HomeController@user');
	Route::get('/user/create','HomeController@createUser');
	Route::post('/user/create','MikrotikController@createUser');
	Route::get('/user/remove/{id}','MikrotikController@removeUser');
	Route::get('/user/{id}/edit','HomeController@editUser');
	Route::post('/user/{id}/edit','HomeController@editUserSave');


	Route::get('/binding','HomeController@IpBinding');	
	Route::get('/binding/create','HomeController@createIpBinding');
	Route::post('/binding/create','MikrotikController@createIpBinding');
	Route::get('/binding/{id}/remove','MikrotikController@removeIpBinding');
	Route::get('/binding/{id}/edit','HomeController@editIpBinding');
	Route::post('/binding/{id}/edit','HomeController@editIpBindingSave');

	Route::get('/active/kill/{id?}','MikrotikController@hotspotKillActive');
	Route::get('/user/active','HomeController@userActive');	

	Route::get('/u/profile','UserController@profile');
	Route::post('/u/profile','UserController@update');

	Route::get('/user/register','UserController@create');
	Route::post('/user/register','UserController@store');

	Route::get('/router','RouterController@edit');
	Route::post('/router','RouterController@update');	

});

Route::group(['middleware'=>'guest'],function(){
	Route::match(['GET','POST'],'/register',function(){
		return view('main-page');
	});	
});

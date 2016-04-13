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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hotspot/profile','MikrotikController@ServerProfile');
Route::get('/hotspot/ip-binding','MikrotikController@IpBinding');
Route::get('/hotspot/user','MikrotikController@hsUsers');
Route::get('/hotspot/user/profile','MikrotikController@UserProfile');
Route::get('/hotspot/active','MikrotikController@hsActive');
Route::get('/hotspot/active/remove/{id?}','MikrotikController@hsActiveRemove');

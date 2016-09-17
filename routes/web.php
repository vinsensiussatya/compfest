<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(array('prefix'=>'api'),function(){
	Route::resource('franchisee','franchisee',array('except'=>array('create','edit')));
});

Route::group(array('prefix'=>'api'),function(){
	Route::resource('pembukuan','pembukuanController',array('except'=>array('create','edit')));
});

Route::group(array('prefix'=>'api'),function(){
	Route::resource('laporan','laporanController',array('except'=>array('create','edit')));
});


Route::post('api/register', 'userController@register');
Route::post('api/authenticate', 'userController@authenticate');
Route::get('api/authenticate/user', 'userController@getAuthenticatedUser');
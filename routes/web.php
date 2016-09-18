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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(array('prefix'=>'api'),function(){
	Route::resource('notafranchisee','notaFranchiseeAPI',array('except'=>array('create','edit')));
});

Route::group(array('prefix'=>'api'),function(){
	Route::resource('franchisee','franchisee',array('except'=>array('create','edit')));
});

Route::group(array('prefix'=>'api'),function(){
	Route::resource('pembukuan','pembukuanController',array('except'=>array('create','edit')));
});

Route::group(array('prefix'=>'api'),function(){
	Route::resource('laporan','laporanController',array('except'=>array('create','edit')));
});


//API LOGIN
Route::post('api/register', 'userController@register');
Route::post('api/authenticate', 'userController@authenticate');
Route::get('api/authenticate/user', 'userController@getAuthenticatedUser');

//Api Pembukuan
Route::get('/api/pembukuan/user/{id}', 'buku@show');

//Franchisor
//Pembukuan franchisor
Route::get('franchisor/pembukuan', 'pembukuanWeb@getData');
Route::post('franchisor/pembukuan', 'pembukuanWeb@store');

//Pembayaran Franchisor
Route::get('/pembayaranfranchisor', 'notaController@notafranchisor');
Route::get('/pembayaranfranchisor/{id}/tolak', 'notaController@tolak');
Route::get('/pembayaranfranchisor/{id}/terima', 'notaController@terima');

//Daftar Franchisee
Route::get('/datafranchisee', 'daftarController@index');
Route::get('/datafranchisee/{id}/hapus', 'daftarController@hapus');
Route::get('/edit/{id}', 'daftarController@edit');
Route::get('/tambah', 'daftarController@tambah');
Route::post('/update/{id}', 'daftarController@update');

//API nota franchisor
Route::get('/api/notafranchisor', 'notaor@show');

//Franchisee
//Pembukuan Franchisee
Route::get('franchisee/pembukuan', 'pembukuanWeb@getData');
Route::post('franchisee/pembukuan', 'pembukuanWeb@store');
Route::get('franchisee/pembukuan/{id}/delete', 'pembukuanWeb@destroy');

//Pembayaran Franchisee
Route::get('/pembayaranfranchisee', 'notaController@notafranchisee');
Route::post('/pembayaranfranchisee/{id}', 'notaController@storenota');

//API nota franchisee
Route::get('/api/notafranchisee/user/{id}', 'notaee@show');

//Statistik
Route::get('/statistik/pemasukan','statistikController@pengeluaranbulan');
Route::get('/statistik/franchisee','statistikController@pengeluaranfranchisee');



//Diary
Route::get('/', 'pemberitahuan@index');
Route::get('diarynewpost','pemberitahuan@create');
Route::post('diarynewpost','pemberitahuan@store');
Route::get('diaryedit/{slug}','pemberitahuan@edit');
Route::post('diaryupdate','pemberitahuan@update');
Route::get('diarydelete/{id}','pemberitahuan@destroy');
Route::get('/diary/{slug}',['as' => 'diary', 'uses' => 'pemberitahuan@show'])->where('slug', '[A-Za-z0-9-_]+');
Route::post('comment/add','CommentController@store');
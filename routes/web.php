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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
//Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']],function()
//{
Route::resource('sekolah','SekolahController');
Route::resource('siswa','SiswaController');
//});

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/sekolahs', function () {
    return view('user.sekolah.create');
});
Route::get('/siswas', function () {
    return view('user.siswa.create');
});




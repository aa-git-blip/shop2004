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
    phpinfo();
    return view('welcome');
});
//用户添加
Route::get('/create','AdminController@create');
Route::post('/admin/insert','AdminController@insert');
Route::get('/index','AdminController@index');
Route::any('delete/{id}','AdminController@delete');
Route::get('edit/{id}','AdminController@edit');
Route::post('/admin/update/{id}','AdminController@update');
Route::get('/login','AdminController@login');
Route::post('/logindo','AdminController@logindo');
//用户表
Route::prefix('user')->group(function(){
    Route::get('/create','UserController@create');
    Route::post('/register','UserController@register');
    Route::get('/index','UserController@index');
    Route::get('/login','UserController@login');
    Route::post('/logindo','UserController@logindo');

});

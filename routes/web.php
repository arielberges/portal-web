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

Route::get('/aaaa', function () {
    return view('welcome');
});

Route::get('/', 'HomeController@index');
	

Route::get('/admin/page', 'AdminPageController@index');
Route::get('/admin/page/create', 'AdminPageController@edit');
Route::get('/admin/page/edit/{id}', 'AdminPageController@edit');
Route::post('/admin/page/create', 'AdminPageController@postEdit');
Route::post('/admin/page/edit/{id}', 'AdminPageController@postEdit');
Route::get('/admin/page/delete/{id}', 'AdminPageController@delete');
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
	

Route::get('/admin/channel', 'AdminChannelController@index');
Route::get('/admin/channel/create', 'AdminChannelController@edit');
Route::get('/admin/channel/edit/{id}', 'AdminChannelController@edit');
Route::post('/admin/channel/create', 'AdminChannelController@postEdit');
Route::post('/admin/channel/edit/{id}', 'AdminChannelController@postEdit');
Route::get('/admin/channel/delete/{id}', 'AdminChannelController@delete');

Route::get('/admin/webinar', 'AdminWebinarController@index');
Route::get('/admin/webinar/create', 'AdminWebinarController@edit');
Route::get('/admin/webinar/edit/{id}', 'AdminWebinarController@edit');
Route::post('/admin/webinar/create', 'AdminWebinarController@postEdit');
Route::post('/admin/webinar/edit/{id}', 'AdminWebinarController@postEdit');
Route::get('/admin/webinar/delete/{id}', 'AdminWebinarController@delete');

Route::get('/webinar', 'WebinarController@index');

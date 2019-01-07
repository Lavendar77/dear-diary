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

Route::get('/', 'PagesController@index')->name('index');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	Route::prefix('user')->group(function() {
		Route::get('/', 'HomeController@index')->name('home');
		Route::get('diary', 'HomeController@diary')->name('diary');
		Route::get('settings', 'HomeController@settings')->name('settings');

		Route::get('viewdiary/{id}', 'DiaryController@viewdiary')->name('diary.view')->where('id', '[0-9]+');
		Route::get('editdiary/{id}', 'DiaryController@editdiary')->name('diary.edit')->where('id', '[0-9]+');

		Route::post('/{id}', 'DiaryController@deleteData')->name('diary.delete')->where('id', '[0-9]+');
		Route::post('viewdiary/{id}', 'DiaryController@updateData')->name('diary.update')->where('id', '[0-9]+');

		Route::post('diary', 'DiaryController@setData')->name('diary');
		Route::post('settings', 'SettingsController@setData')->name('settings');
	});
});
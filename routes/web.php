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

Route::get('/', 'HomeController@index')->name('home');

Route::get('nosotros', 'HomeController@aboutUs')->name('aboutUs');

Route::get('servicios', 'HomeController@services')->name('services');

Route::get('blog', 'HomeController@blog')->name('blog');

Route::get('blog/post/{blog_id}', 'HomeController@post')->name('post');

Route::get('contacto', 'HomeController@contact')->name('contact');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/analytics/views', 'AnalyticsController@index')->name('analytics');

Route::post('message/store', 'ContactController@store')->name('store_message');

Route::middleware(['auth'])->prefix('admin')->group(function () {

	/*** Banners ***/
	Route::get('banner', 'BannerController@index')->name('banner');
	Route::get('banner/add', 'BannerController@create')->name('add_banner');
	Route::post('banner/store', 'BannerController@store')->name('store_banner');
	Route::get('banner/edit/{id}',['as'=>'edit_banner', 'uses' => 'BannerController@edit']);
	Route::put('banner/update/{id}',['as'=>'update_banner', 'uses' => 'BannerController@update']);
	Route::get('banner/destroy/{id}',['as'=>'destroy_banner', 'uses' => 'BannerController@destroy']);

	/*** Pages ***/
	Route::get('section', 'SectionController@index')->name('section');
	Route::get('section/add', 'SectionController@create')->name('add_section');
	Route::post('section/store', 'SectionController@store')->name('store_section');
	Route::get('section/edit/{id}',['as'=>'edit_section', 'uses' => 'SectionController@edit']);
	Route::put('section/update/{id}',['as'=>'update_section', 'uses' => 'SectionController@update']);
	Route::get('section/destroy/{id}',['as'=>'destroy_section', 'uses' => 'SectionController@destroy']);

	/*** Users ***/
	Route::get('user', 'UserController@index')->name('users');
	Route::get('user/add', 'UserController@create')->name('add_user');
	Route::post('user/store', 'UserController@store')->name('store_user');
	Route::get('user/edit/{id}',['as'=>'edit_user', 'uses' => 'UserController@edit']);
	Route::put('user/update/{id}',['as'=>'update_user', 'uses' => 'UserController@update']);
	Route::get('user/reset/{id}',['as'=>'reset_pass_user', 'uses' => 'UserController@reset_pass']);
	Route::post('user/update/pass/',['as'=>'change_pass_user', 'uses' => 'UserController@change_pass']);
	Route::get('user/destroy/{id}',['as'=>'destroy_user', 'uses' => 'UserController@destroy']);
	
	/*** Company ***/
	Route::get('company', 'CompanyController@index')->name('company');
	Route::post('company/store', 'CompanyController@store')->name('store_company');
	Route::get('company/edit/{id}',['as'=>'edit_company', 'uses' => 'CompanyController@edit']);
	Route::put('company/update/{id}',['as'=>'update_company', 'uses' => 'CompanyController@update']);

	/*** Blog ***/
	Route::get('blog', 'BlogController@index')->name('post');
	Route::get('blog/add', 'BlogController@create')->name('add_post');
	Route::post('blog/store', 'BlogController@store')->name('store_post');
	Route::get('blog/edit/{id}',['as'=>'edit_post', 'uses' => 'BlogController@edit']);
	Route::put('blog/update/{id}',['as'=>'update_post', 'uses' => 'BlogController@update']);
	Route::get('blog/destroy/{id}',['as'=>'destroy_post', 'uses' => 'BlogController@destroy']);

	/*** Messages ***/
	Route::get('messages', 'ContactController@index')->name('messages');
	Route::get('messages/show/{id}',['as'=>'show_message', 'uses' => 'ContactController@show']);
	Route::get('messages/destroy/{id}',['as'=>'destroy_message', 'uses' => 'ContactController@destroy']);

	/*** Analytics ***/

});

Auth::routes();

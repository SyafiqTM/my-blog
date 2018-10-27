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

//default home
Route::get('/', 'PostController@index')->name('home');

// all prefix customer stored here
Route::prefix('user')->group(function () {

  Route::get('/login', 'User\LoginController@login')->name('user.login');
  Route::post('/login', 'User\LoginController@loginCustomer')->name('user.loginCustomer');
  Route::post('/logout', 'User\LoginController@logout')->name('user.logout');
  // Route::get('logout', 'Auth\Customer\LoginController@d_logout');
  Route::get('/register', 'User\RegisterController@create');
  Route::post('/register', 'User\RegisterController@store')->name('user.register');

  Route::get('/profile', 'User\ProfileController@index')->name('user.profile');
  Route::post('/profile-update/{id}', 'User\ProfileController@update');
  Route::post('/image-update/{id}', 'User\ProfileController@imageUpload');

  Route::get('/my-post/{id}' , 'User\ProfileController@myPost')->name('posts.list');
  Route::post('/my-post/delete/{id}' , 'PostController@destroy');
});

// show single post
Route::get('{post}' , 'PostController@show');
Route::get('archieve/{month?}/{year?}', 'PostController@archieve');
Route::post('search', 'PostController@search')->name('search');

Route::get('create/post', 'PostController@create')->name('posts.create');
Route::post('store/post', 'PostController@store')->name('posts.store');

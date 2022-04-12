<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');



Route::group(['middleware' => 'auth', 'author'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/post', 'PostController@index')->name('post');
    Route::get('/post/tambah', 'PostController@create')->name('post.create');
    Route::post('/post/simpan', 'PostController@store')->name('post.save');
    Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::post('/post/edit', 'PostController@update')->name('post.update');
    Route::delete('/post/delete/{id}', 'PostController@destroy')->name('post.delete');
});

Route::group(['middleware' => 'auth', 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/post', 'PostController@index')->name('post');
    Route::get('/post/tambah', 'PostController@create')->name('post.create');
    Route::post('/post/simpan', 'PostController@store')->name('post.save');
    Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::post('/post/edit', 'PostController@update')->name('post.update');
    Route::delete('/post/delete/{id}', 'PostController@destroy')->name('post.delete');

    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/user/tambah', 'UserController@create')->name('user.create');
    Route::post('/user/simpan', 'UserController@store')->name('user.save');
    Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('/user/update', 'UserController@update')->name('user.update');
    Route::delete('/user/hapus/{id}', 'UserController@destroy')->name('user.delete');
});

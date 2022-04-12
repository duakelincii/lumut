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
    Route::post('/post/simpan', 'PostController@index')->name('post.save');
});

Route::group(['middleware' => 'auth', 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/post', 'PostController@index')->name('post');
    Route::get('/post/tambah', 'PostController@create')->name('post.create');
    Route::post('/post/simpan', 'PostController@index')->name('post.save');

    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/user/tambah', 'UserController@create')->name('user.create');
    Route::post('/user/simpan', 'UserController@store')->name('user.save');
});

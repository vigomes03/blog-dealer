<?php

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


Auth::routes();

// Rotas relacionadas a POSTS
Route::get('/', 'PostsController@list_posts')->name('home');
Route::get('/new_post', 'PostsController@new_post')->name('new_post');
Route::post('/save_post', 'PostsController@save_post')->name('save_post');
Route::post('/update_post', 'PostsController@update_post')->name('update_post');
Route::post('/save_update_post', 'PostsController@save_update_post')->name('save_update_post');
Route::post('/remove_post', 'PostsController@remove_post')->name('remove_post');

// Rotas relacionadas a User
Route::get('/list_users', 'UserController@list_users')->name('list_users');
Route::any('/update_user', 'UserController@update_user')->name('update_user');
Route::post('/save_update_user', 'UserController@save_update_user')->name('save_update_user');

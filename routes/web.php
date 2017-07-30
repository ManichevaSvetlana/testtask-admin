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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'AdminController@index')->name('admin-index');
Route::get('/users', 'AdminController@getUsers')->name('admin-users');
Route::get('/groups', 'AdminController@getGroups')->name('admin-groups');
Route::get('/users/user-{user}', 'AdminController@getUser')->name('admin-user-profile');
Route::get('/groups/group-{group}', 'AdminController@getGroup')->name('admin-group-profile');

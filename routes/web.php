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

Route::resource('user', 'UserController');
Route::resource('group', 'GroupController');

Route::post('/groups-list', function(\Illuminate\Http\Request $request){
    $pattern = ''.$request->value.'%';
    try {
        return \App\Group::where('name', 'like', $pattern)->get();


    }
    catch(ErrorException $e){
        return '';
    }
});
Route::post('/group-get', function(\Illuminate\Http\Request $request){
    $name = $request->value;
    try {
        return \App\Group::where('name', $name)->get();
    }
    catch(ErrorException $e){
        return '';
    }
});
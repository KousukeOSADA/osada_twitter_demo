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

route::get('/', function () {
    return view('top');
});
Route::group(['middleware' => 'auth'], function () {
    Route::post('users/{user}/follow', 'UserController@follow')->name('follow');
    Route::delete('users/{user}/unfollow', 'UserController@unfollow')->name('unfollow');
});
route::resource('users', 'UserController');
route::resource('posts', 'PostController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

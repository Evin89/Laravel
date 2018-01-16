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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$uri = 'warband';
$callback = 'WarbandsController@index';

// warband routes
Route::get('/warbands', 'WarbandsController@index');
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);

// User routes
Route::get('/users', 'UserController@index'); // show all
Route::get('/users/create', 'UserController@create'); // create page
Route::post('users', 'UserController@store'); // store post from create
Route::get('/users/{id}', 'UserController@show')->where('id', '[0-9]+'); // show with id
Route::get('/users/{id}/edit', 'UserController@edit')->where('id', '[0-9]+'); // edit with id
Route::post('/users/{id}', 'UserController@update')->where('id', '[0-9]+'); // store from post with id (update)
Route::delete('users/{id}', 'UserController@destroy')->where('id', '[0-9]+'); // delete with id

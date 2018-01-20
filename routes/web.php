<?php

use Illuminate\Http\Request;
use Mordheim\Warband;

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

Route::get('/', 'WelcomeController@index');

Auth::routes();

// Route for home user panel
Route::get('/home', 'HomeController@index')->middleware('auth');

// warbands routes
Route::get('/warbands', 'WarbandController@index');
Route::get('/warbands/create', 'WarbandController@create')->middleware('auth');
Route::get('/warbands/{id}', 'WarbandController@show')->where('id', '[0-9]+'); // show with id
Route::get('/warbands/{id}/edit', 'WarbandController@edit')->where('id', '[0-9]+')->middleware('auth'); // edit with id
Route::delete('/warbands/{id}', 'WarbandController@destroy')->middleware('auth');
Route::post('/warbands', 'WarbandController@store')->middleware('auth');
Route::patch('/warbands/{id}', 'WarbandController@update')->middleware('auth');
Route::patch('warbands/{id}/up', 'WarbandController@ratingUp')->middleware('auth');
Route::patch('warbands/{id}/down', 'WarbandController@ratingDown')->middleware('auth');
Route::get('warbands/search', 'WarbandController@search');

// Types routes
Route::get('/types', 'TypesController@index');
Route::get('/types/create', 'TypesController@create')->middleware('auth');
Route::get('/types/{id}', 'TypesController@show')->where('id', '[0-9]+'); // show with id
Route::get('/types/{id}/edit', 'TypesController@edit')->where('id', '[0-9]+')->middleware('auth'); // edit with id
Route::delete('/types/{id}', 'TypesController@destroy')->middleware('auth');
Route::post('/types', 'TypesController@store')->middleware('auth');
Route::patch('/types/{id}', 'TypesController@update')->middleware('auth');

// User routes for admin. Get get, edit, etc all users.
Route::get('/users', 'usersController@index'); // show all
Route::get('/users/create', 'usersController@create')->middleware('auth'); // create page
Route::post('/users', 'usersController@store')->middleware('auth'); // store post from create
Route::get('/users/{id}', 'usersController@show')->where('id', '[0-9]+'); // show with id
Route::get('/users/{id}/edit', 'usersController@edit')->where('id', '[0-9]+')->middleware('auth'); // edit with id
Route::patch('/users/{id}', 'usersController@update')->where('id', '[0-9]+')->middleware('auth'); // store from post with id (update)
Route::delete('/users/{id}', 'usersController@destroy')->where('id', '[0-9]+')->middleware('auth'); // delete with id

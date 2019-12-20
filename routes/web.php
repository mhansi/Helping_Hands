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

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::post('/storePost','postController@store');
Route::get('/home', 'postController@show');
Route::get('/getHelp', 'postController@viewGetHelp')->name('getHelp');
Route::get('/doHelp', 'postController@viewDoHelp')->name('doHelp');
Route::get('/getHelp', 'postController@showGetHelp')->name('getHelp');
Route::get('/doHelp', 'postController@showDoHelp')->name('doHelp');

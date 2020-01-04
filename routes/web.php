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
Route::get('/viewMessage/{id}', 'HomeController@viewMessage');
Route::get('/home/getHelp', 'postController@viewGetHelp')->name('getHelp');
Route::get('/home/doHelp', 'postController@viewDoHelp')->name('doHelp');
Route::get('/home/getHelp', 'postController@showGetHelp')->name('getHelp');
Route::get('/home/doHelp', 'postController@showDoHelp')->name('doHelp');
Route::get('/home/viewUser/{user}', 'postController@viewUser');
Route::get('/delete/{postId}', 'postController@deletePost');
Route::post('/sendEmail', 'sendEmailController@send');
Route::get('/edit/{postId}', 'postController@editPost');
Route::post('/resubmit', 'postController@resubmit');
Route::get('/viewMessages/{messageId}','postController@viewMessagePanel');
Route::get('/userAccount','HomeController@userAccount');
Route::post('/updateUserAccount', 'HomeController@updateUserAccount');



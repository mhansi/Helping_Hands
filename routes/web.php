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
    return view('land');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::post('/storePost', 'postController@store')->middleware('verified');
Route::get('/viewMessage/{id}', 'HomeController@viewMessage')->middleware('verified');
Route::get('/home/getHelp', 'postController@viewGetHelp')->name('getHelp')->middleware('verified');
Route::get('/home/doHelp', 'postController@viewDoHelp')->name('doHelp')->middleware('verified');
Route::get('/home/getHelp', 'postController@showGetHelp')->name('getHelp')->middleware('verified');
Route::get('/home/doHelp', 'postController@showDoHelp')->name('doHelp')->middleware('verified');
Route::get('/viewUser/{user}', 'postController@viewUser')->middleware('verified');
Route::get('/delete/{postId}', 'postController@deletePost')->middleware('verified');
Route::post('/sendEmail', 'sendEmailController@send')->middleware('verified');
Route::get('/edit/{postId}', 'postController@editPost')->middleware('verified');
Route::post('/resubmit', 'postController@resubmit')->middleware('verified');
Route::get('/viewMessages/{messageId}', 'postController@viewMessagePanel')->middleware('verified');
Route::get('/userAccount', 'HomeController@userAccount')->middleware('verified');
Route::post('/updateUserAccount', 'HomeController@updateUserAccount')->middleware('verified');
Route::get('/admin','HomeController@admin')->middleware('verified');
Route::get('/users','HomeController@users')->middleware('verified');
Route::post('/searchedUsers' , 'HomeController@searchedUsers')->middleware('verified');
Route::post('/searchedPosts', 'HomeController@serchedPosts')->middleware('verified');
Route::post('/reportPost','postController@report')->middleware('verified');
route::get('/unReport/{id}','postController@unReport')->middleware('verified');
route::get('/deactivate', 'HomeController@deactivate')->middleware('verified');
route::get('/deleteUser/{id}', 'HomeController@deleteUser')->middleware('verified');

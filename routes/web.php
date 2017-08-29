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

/******************BackEnd*********************/

Route::post('/tokens','SentTokensController@generate');  //fe done
Route::get('/tokens','SentTokensController@showAll');  //fe done !!check
Route::get('/tokens/{id}','SentTokensController@showTokenDetails'); //fe done

Route::get('/opens','OpenedTokensController@track'); //no auth, no fe

Route::get('/stats','SentTokensController@stats');
Route::get('/stats/{id}','SentTokensController@tokenStats');

Route::get('/frauds/{id}','SentTokensController@tokenFrauds'); //fe done

Route::delete('/tokens/{id}','SentTokensController@delete'); //fe done



/******************FrontEnd*********************/



Route::get('/dashboard', 'SessionsController@dash')->name('home');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');

Route::get('/','SessionsController@create');
Route::post('/','SessionsController@store');

Route::get('/logout','SessionsController@destroy');

Route::get('/openToken','DisplayController@openToken');
Route::get('/clickToken','DisplayController@clickToken');
Route::get('/myTokens/{type}','DisplayController@myTokens');
Route::get('/logs/{id}','DisplayController@logs');
Route::get('/fraudStats/{id}','DisplayController@frauds');
Route::get('/delete/{id}','DisplayController@delete');
Route::get('/delete/confirm/{id}','DisplayController@deleteConfirm');

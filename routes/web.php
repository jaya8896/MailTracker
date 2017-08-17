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

Route::post('/tokens','SentTokensController@generate');
Route::get('/tokens','SentTokensController@showAll');
Route::get('/tokens/{id}','SentTokensController@showTokenDetails');

Route::get('/opens','OpenedTokensController@track'); //no auth

Route::get('/stats','SentTokensController@stats');
Route::get('/stats/{id}','SentTokensController@tokenStats');

Route::get('/frauds/{id}','SentTokensController@tokenFrauds');

Route::delete('/tokens/{id}','SentTokensController@delete');
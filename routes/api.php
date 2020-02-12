<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('v1/trader','Api\DayzController@getTrader');
Route::get('v1/allitem','Api\DayzController@getItemsAll');
Route::get('v1/finditem/{item}','Api\DayzController@getFindItem');
Route::get('v1/trader/categoria','Api\DayzController@getCategoriaTrader');
Route::post('v1/trader/update','Api\DayzController@setUpdateTrader');
Route::post('v1/trader/delete','Api\DayzController@setDeleteTrader');

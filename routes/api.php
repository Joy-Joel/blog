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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
   // return $request->user();
//});
Route::resource('/users', 'ApisssController');
Route::post('/login', 'ApisssController@login');
Route::post('/posts/create','ApisssController@store');
Route::resource('/posts/edit','ApisssController@edit');
Route::put('/posts/edit', 'ApisssController@update');


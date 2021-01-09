<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/home', 'App\Http\Controllers\addController@postIndex');
Route::get('/registrationAccount', 'App\Http\Controllers\Account@registrationAccount');
Route::get('/registrationTask', 'App\Http\Controllers\Task@registrationTask');
Route::get('/getTask', 'App\Http\Controllers\Task@getTask');
Route::get('/duplicateCheck', 'App\Http\Controllers\Account@duplicateCheck');

<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('top');
// });

// Route::get('/check', function () {
//     return view('check');
// });
Route::get('/', 'App\Http\Controllers\addController@getIndex');
Route::post('/check', 'App\Http\Controllers\addController@postIndex');
Route::post('/fin', function () {
    return view('fin');
});
Route::post('/error', function () {
    return view('error');
});
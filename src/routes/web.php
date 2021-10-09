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

Route::get('/url/top', 'App\Http\Controllers\UrlController@top');
Route::get('/url/{url}', 'App\Http\Controllers\UrlController@show');
Route::get('/url', 'App\Http\Controllers\UrlController@index');
Route::post('/url', 'App\Http\Controllers\UrlController@store');

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/url/top', 'App\Http\Controllers\UrlApiController@top');
Route::get('v1/url/{url}', 'App\Http\Controllers\UrlApiController@show');
Route::post('v1/url', 'App\Http\Controllers\UrlApiController@store');

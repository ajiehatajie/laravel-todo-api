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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


use App\Task;
use App\Http\Resources\Tasks as ResourceTask;


Route::get('task', 'API\V1\TaskController@index');
Route::post('task', 'API\V1\TaskController@store');
Route::get('task/{id}', 'API\V1\TaskController@show');

Route::get('task/{id}/edit', 'API\V1\TaskController@edit');
Route::post('task/{id}/update', 'API\V1\TaskController@update');
Route::delete('task/{id}', 'API\V1\TaskController@destroy');


Route::get('customer', 'API\V1\CustomerController@index');
Route::post('customer', 'API\V1\CustomerController@store');
Route::get('customer/{id}', 'API\V1\CustomerController@show');
Route::post('customer/{id}/update', 'API\V1\CustomerController@update');
Route::delete('customer/{id}', 'API\V1\CustomerController@destroy');

Route::post('customer/{id}/follow', 'API\V1\CustomerController@followUp');

Route::get('customer/{id}/follow', 'API\V1\CustomerController@FollowDetail');

Route::get('follow/{userid}', 'API\V1\FollowController@show');






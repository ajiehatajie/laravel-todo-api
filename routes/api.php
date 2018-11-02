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




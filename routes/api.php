<?php

use Illuminate\Http\Request;
use App\Task;
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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['middleware' => 'api'], function() {
    Route::get('tasks', function() {
        return Task::latest()->orderBy('created_at','desc')->get();
    });

    Route::get('task/{id}', function($id) {
        return Task::findOrFail($id);
    });
});
